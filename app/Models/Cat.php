<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cat extends Model
{
    protected $fillable = [
        'user_id',
        'name_cat',
        'age',
        'gender',
        'location',
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
        return $this->hasOne(AdopsiPost::class, 'cat_id');
    }
}
