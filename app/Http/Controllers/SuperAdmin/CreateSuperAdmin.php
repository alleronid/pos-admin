<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateSuperAdmin extends Controller
{
    public function index()
    {
        return view('create-root');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $image = Media::factory()->create([
            'src' => 'defualt/profile.jpg',
            'path' => 'user/',
        ])->id;

        // Create the super admin user
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'thumbnail_id' => $image,
        ]);

        // Assign the super admin role
        $user->assignRole('super admin');

        // Redirect to the dashboard or any other page
        return redirect()->route('signin.index')->with('success', 'You are ready to use ReadyPOS! Please login with your credentials.');
    }
}
