<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Carbon\Carbon;

class News extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $connection = 'mongodb';
    protected $collection = 'news';

    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getCreatedAtAttribute($created_at){
        return $created_at->toDateTime();
    }
}
