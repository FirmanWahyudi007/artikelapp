<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MudVulcanoImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'mud_vulcano_id',
        'path_image',
    ];

    public function mudVulcano()
    {
        return $this->belongsTo(MudVulcano::class);
    }
}
