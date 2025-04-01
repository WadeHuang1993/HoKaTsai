<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'articles';

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_at',
        'status',
    ];

    public $timestamps = true;
} 