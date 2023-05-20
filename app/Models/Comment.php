<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama',
        'email',
        'isi_komentar',
    ];

    public function details()
    {
        return $this->hasOne(Detail::class);
    }
}
