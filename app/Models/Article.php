<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use MongoDB\BSON\UTCDateTime;

/**
 *
 */
class Article extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'articles';

    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
        'tag',
    ];


    protected $casts = [
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
        'deleted_at' => 'immutable_datetime',
    ];

    public function getCreatedAtAttribute(UTCDateTime $created_at)
    {
        $datetime = $created_at->toDateTimeImmutable();
        $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Taipei'));
        return $datetime;
    }
}
