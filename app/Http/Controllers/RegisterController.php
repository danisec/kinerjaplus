<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.register.index', [
            'title' => 'Register',
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
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:50|unique:users,username',
            'email' => 'required|email:dns|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
        ], [
            'fullname.required' => 'Fullname is required.',
            'fullname.max' => 'Fullname is too long.',
            'username.required' => 'Username is required.',
            'username.max' => 'Username is too long.',
            'username.unique' => 'Username is already taken.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is invalid.',
            'email.max' => 'Email is too long.',
            'email.unique' => 'Email is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password is too short.',
            'password.max' => 'Password is too long.',
        ]);

        DB::beginTransaction();

        try {
            User::create([
                'fullname' => $validated['fullname'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            DB::commit();

            $notif = notify()->success('Register success!', '');

            return redirect()->route('login.index')->withInput()->with('notif', $notif);
        } catch (\Exception $e) {
            DB::rollBack();

            $notif = notify()->error('Register failed!', '');

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
