<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'likes',
        'dislikes',
        'parent_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'post_id' => 'integer',
        'likes' => 'integer',
        'dislikes' => 'integer',
        'parent_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}