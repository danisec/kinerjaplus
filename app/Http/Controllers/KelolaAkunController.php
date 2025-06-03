<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelolaAkun\StoreKelolaAkunRequest;
use App\Http\Requests\KelolaAkun\UpdateKelolaAkunRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class KelolaAkunController extends Controller
{
    /* 
     * Constructor
     */
    private $roles;

    public function __construct()
    {
        $this->roles = Role::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.name as role')
        ->orderBy('users.created_at', 'ASC')
        ->filter(request(['search']))
        ->paginate(10)
        ->withQueryString();

        $roleColors = [
            'superadmin' => 'bg-rose-100 text-rose-600',
            'admin' => 'bg-rose-100 text-rose-600',
            'yayasan' => 'bg-emerald-100 text-emerald-600',
            'deputi' => 'bg-indigo-100 text-indigo-600',
            'kepala sekolah' => 'bg-lime-100 text-lime-600',
            'guru' => 'bg-fuchsia-100 text-fuchsia-600',
            'IT' => 'bg-sky-100 text-sky-600',
            'default' => 'bg-zinc-100 text-zinc-600',
        ];

        return view('pages.it.kelola-akun.index', [
            'title' => 'Kelola Akun',
            'user' => $user,
            'roleColors' => $roleColors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Generate a random password
        $randomPassword = Str::password(16, true, true, true, false);

        return view('pages.it.kelola-akun.create', [
            'title' => 'Tambah Akun',
            'roles' => $this->roles,
            'randomPassword' => $randomPassword,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelolaAkunRequest $request)
    {
        try {
            $user = User::create([
                'fullname' => $request['fullname'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);

            // Assign role using spatie/laravel-permission
            $user->assignRole($request['role']);

            $notif = notify()->success('Akun berhasil ditambahkan');
            return redirect()->route('kelolaAkun.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menambahkan akun');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get user by id
        $user = User::findOrFail($id);

        // Get permssion from model_has_permissions
        $directPermissions = $user->getDirectPermissions();

        // If there are no direct permissions, get permissions from roles
        if ($directPermissions->isEmpty()) {
            $permissions = $user->getPermissionsViaRoles();
        } else {
            $permissions = $directPermissions;
        }

        return view('pages.it.kelola-akun.show', [
            'title' => 'Detail Akun',
            'user' => $user,
            'permission' => $permissions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get user by id
        $user = User::findOrFail($id);

        // Get all permissions
        $allPermissions = Permission::all();

        // Get permssion from model_has_permissions
        $directPermissions = $user->getDirectPermissions()->pluck('id')->toArray();

        // Get permissions from role_has_permissions if no directPermissions
        $rolePermissions = $directPermissions ? [] : $user->getPermissionsViaRoles()->pluck('id')->toArray();

        // Merge directPermissions and rolePermissions
        $selectedPermissions = array_merge($directPermissions, $rolePermissions);
        
        return view('pages.it.kelola-akun.edit', [
            'title' => 'Ubah Akun',
            'user' => $user,
            'roles' => $this->roles,
            'allPermissions' => $allPermissions,
            'selectedPermissions' => $selectedPermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelolaAkunRequest $request, string $id)
    {        
        try {
            $user = User::findOrFail($id);

            if ($request['password']) {
                $user->update([
                    'fullname' => $request['fullname'],
                    'username' => $request['username'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                ]);
            } else {
                $user->update([
                    'fullname' => $request['fullname'],
                    'username' => $request['username'],
                    'email' => $request['email'],
                ]);
            }

            // Sync role user
            $user->syncRoles($request['role']);

            // Update permissions for the role
            $permissions = Permission::whereIn('id', $request['permission'])->pluck('name')->toArray();
            $user->syncPermissions($permissions);

            // Clear any relevant caches (optional)
            cache()->forget("spatie.permission.cache.user.{$user->id}");
            cache()->forget("spatie.role_has_permissions.cache.user.{$user->id}");

            $notif = notify()->success('Akun berhasil diubah');
            return redirect()->route('kelolaAkun.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah akun');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::findOrFail($id)->delete();

            $notif = notify()->success('Akun berhasil dihapus');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menghapus akun');
            return back();
        }
    }
}
