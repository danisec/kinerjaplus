<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class KelolaAkunController extends Controller
{
    /* 
     * Constructor
     */
    private $role;

    public function __construct()
    {
        $this->roles = Role::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {      
        return view('pages.it.kelola-akun.index', [
            'title' => 'Kelola Akun',
            'user' => User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.name as role')
                ->orderBy('users.created_at', 'ASC')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.it.kelola-akun.create', [
            'title' => 'Tambah Akun',
            'roles' => $this->roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required', 'min:4', 'max:255', 'unique:users',
            'email' => 'required|email:dns|unique:users',
            'role' => 'required|exists:roles,name',
            'password' => 'required|min:8|max:255',
        ],[
            'fullname.required' => 'Nama lengkap harus diisi',
            'fullname.max' => 'Nama lengkap maksimal 255 karakter',
            'username.required' => 'Nama pengguna harus diisi',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.max' => 'Nama pengguna maksimal 255 karakter',
            'username.unique' => 'Nama pengguna sudah digunakan',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'role.required' => 'Peran pengguna harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
        ]);

        try {
            $user = User::create([
                'fullname' => $validatedData['fullname'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Assign role using spatie/laravel-permission
            $user->assignRole($validatedData['role']);

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
        // Dapatkan semua permission yang ada pada user tersebut
        $permission = User::findOrFail($id)->getAllPermissions();

        return view('pages.it.kelola-akun.show', [
            'title' => 'Detail Akun',
            'user' => User::findOrFail($id),
            'permission' => $permission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Dapatkan semua permission yang ada
        $permission = Permission::whereNotIn('name', ['perbandingan-kriteria', 'perbandingan-subkriteria', 'view perbandingan-kriteria', 'view perbandingan-subkriteria', 'perbandingan-karyawan'])->get();
        
        return view('pages.it.kelola-akun.edit', [
            'title' => 'Ubah Akun',
            'user' => User::findOrFail($id),
            'roles' => $this->roles,
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'max:255',
            'username' => 'min:4', 'max:255',
            'email' => 'email:dns',
            'role' => 'required|exists:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'exists:permissions,id',
            'password' => 'nullable|min:8|max:255',
        ],[
            'fullname.max' => 'Nama lengkap maksimal 255 karakter',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.max' => 'Nama pengguna maksimal 255 karakter',
            'email.email' => 'Email tidak valid',
            'permission.required' => 'Permission harus dipilih',
            'permission.*.exists' => 'Permission yang dipilih tidak valid',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
        ]);
        
        try {
            $user = User::findOrFail($id);

            if ($validatedData['password']) {
                $user->update([
                    'fullname' => $validatedData['fullname'],
                    'username' => $validatedData['username'],
                    'email' => $validatedData['email'],
                    'password' => bcrypt($validatedData['password']),
                ]);
            } else {
                $user->update([
                    'fullname' => $validatedData['fullname'],
                    'username' => $validatedData['username'],
                    'email' => $validatedData['email'],
                ]);
            }

            // Sync roles using Spatie
            $user->syncRoles($validatedData['role']);

            // Sync permissions using Spatie
            $permissions = Permission::whereIn('id', $validatedData['permission'])->pluck('name')->toArray();
            $user->syncPermissions($permissions);

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
