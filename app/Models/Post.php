<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'type', 'title', 'content', 'user_id', 'blog_image'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function visitStats()
    {
        return $this->hasMany(VisitStat::class);
    }
}
