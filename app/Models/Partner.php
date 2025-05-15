<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'partners';

    protected $fillable = [
        'name',
        'logo',
        'description',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
} 