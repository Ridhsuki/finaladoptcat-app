<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
        protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'bio',
        'about',
        'profile_picture',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function adoptPost()
    {
        return $this->hasMany(AdopsiPost::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function visitStats()
    {
        return $this->hasMany(VisitStat::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, 'admin@gmail.com') ||  $this->role === 'admin';
    }
}
