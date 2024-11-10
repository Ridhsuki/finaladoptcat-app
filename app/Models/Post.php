<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'type', 'title', 'content', 'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function commenst() {
        return $this->hasMany(Comment::class);
    }
    public function visitStats()
    {
        return $this->hasMany(VisitStat::class);
    }
}
