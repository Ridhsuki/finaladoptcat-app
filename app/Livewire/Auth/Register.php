<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Title;

class Register extends Component
{
    #[Title('Register')]
    public $name;
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        // if ($user->role === 'user') {
        //     if (!$user->phone || !$user->bio || !$user->about || !$user->profile_picture) {
                return redirect()->route('profile.edit');
        //     }
            // return redirect('profile.edit'); // Halaman utama user
        // }
        // return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
