<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    /* 
     * Constructor
     */
    private $role;

    public function __construct()
    {
        $this->role = ['0' => 'manajer','1' => 'pimpinan','2' => 'guru'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {      
        return view('pages.dashboard.kelola-akun.index', [
            'title' => 'Kelola Akun',
            'user' => User::orderBy('fullname', 'ASC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.kelola-akun.create', [
            'title' => 'Tambah Akun',
            'role' => $this->role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:255',
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'role' => 'required',
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
            User::create([
                'fullname' => $validatedData['fullname'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
                'password' => bcrypt($validatedData['password']),
            ]);

            $notif = notify()->success('Akun berhasil ditambahkan');
            return redirect()->route('kelolaAkun.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menambahkan akun');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.dashboard.kelola-akun.show', [
            'title' => 'Detail Akun',
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.dashboard.kelola-akun.edit', [
            'title' => 'Ubah Akun',
            'user' => User::findOrFail($id),
            'role' => $this->role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'fullname' => 'max:255',
            'username' => ['min:4', 'max:255'],
            'email' => 'email:dns',
            'role' => 'required',
            'password' => 'min:8|max:255',
        ],[
            'fullname.max' => 'Nama lengkap maksimal 255 karakter',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.max' => 'Nama pengguna maksimal 255 karakter',
            'email.email' => 'Email tidak valid',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
        ]);
        
        try {
            $user = User::findOrFail($id);
            $user->update([
                'fullname' => $validatedData['fullname'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
                'password' => bcrypt($validatedData['password']),
            ]);

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
