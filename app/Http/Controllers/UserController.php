<?php

namespace App\Http\Controllers;

use App\Models\AdopsiPost;
use App\Models\User;
use App\Models\Cat;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        $adoptPosts = Cat::where('user_id', $user->id) // Filter berdasarkan user yang sedang login
            ->whereHas('adoptPost', function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            })
            ->with(['adoptPost' => function ($query) {
                $query->whereIn('status', ['pending', 'approved']);
            }])
            ->get();
        $blogPosts = Post::where('user_id', $user->id)->get();

        return view('user-profile', compact('user', 'adoptPosts', 'blogPosts'));
    }

    public function edit()
    {
        return view('user-edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'about' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();


        if (!$user) {
            return redirect()->route('login'); // Or handle the case where the user is not authenticated
        }

        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        if ($request->has('bio')) {
            $user->bio = $request->bio;
        }

        if ($request->has('about')) {
            $user->about = $request->about;
        }

        if ($request->hasFile('profile_picture')) {
            // Upload gambar dan simpan path-nya
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }
        $user->save();

        return redirect()->route('profile.show'); // Atau halaman lain setelah berhasil update
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();

        // Delete related resources if necessary
        // Example: $user->posts()->delete();

        // Delete user
        $user->delete();

        // Logout the user after account deletion
        Auth::logout();

        // Redirect to the homepage with a message
        return redirect('/login')->with('message', 'Your account has been deleted.');
    }
}
