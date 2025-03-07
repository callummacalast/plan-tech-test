<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnailUrl',
        'duration',
        'views',
        'author',
        'videoUrl',
        'description',
        'subscriberCount',
        'isLive',
    ];
}
