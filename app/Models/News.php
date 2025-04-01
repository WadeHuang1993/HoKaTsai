<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class News extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'news';

    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status' => 'boolean',
    ];
}
