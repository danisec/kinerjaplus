<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Auth::user();

        return view('pages.dashboard.profile.index', [
            'title' => 'My Profile',
            'profile' => $profile,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Auth::user();
        
        return view('pages.dashboard.profile.settings', [
            'title' => 'My Profile',
            'profile' => $profile,
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
            'password' => 'nullable|min:8|max:255',
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

            $notif = notify()->success('Profile berhasil diubah');
            return back()->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah profile');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
