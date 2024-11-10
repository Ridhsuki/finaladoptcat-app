<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cat extends Model
{
    protected $fillable = [
        'name_cat',
        'age',
        'gender',
        'description',
        'status',
        'photo_url'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function adoptPost()
    {
        return $this->hasMany(AdopsiPost::class);
    }
}
