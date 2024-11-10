<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdopsiPost extends Model
{
    protected $fillable = [
        'user_id',
        'cat_id',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function cat() {
        return $this->belongsTo(Cat::class);
    }
}
