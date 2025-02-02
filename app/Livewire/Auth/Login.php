<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:6|max:255'
        ]);

        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            session()->flash('error', 'Invalid email or password');
            return;
        }

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin'); // Rute bawaan Filament
        }
        if ($user->role === 'admin') {
            return redirect()->route('filament.pages.dashboard'); // Rute bawaan Filament
        }


        if ($user->role === 'user') {
            if (!$user->phone || !$user->bio || !$user->about || !$user->profile_picture) {
                return redirect()->route('profile.edit'); // Rute untuk melengkapi profil
            }
            return redirect('/'); // Halaman utama user
        }
        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
