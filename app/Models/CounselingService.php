<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class CounselingService extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'counseling_services';

    protected $fillable = [
        'title',
        'description',
        'image',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];
}
