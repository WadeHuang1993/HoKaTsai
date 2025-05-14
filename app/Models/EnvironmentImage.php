<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class EnvironmentImage extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'environment_images';

    protected $fillable = [
        'image',
        'title',
        'description',
        'order',
    ];

    public $timestamps = true;
}
