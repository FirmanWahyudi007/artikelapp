<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //soft delete
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
