<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Carbon\Carbon;
use MongoDB\BSON\UTCDateTime;

class News extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'news';

    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
    ];

    public function getCreatedAtAttribute(UTCDateTime $created_at)
    {
        $datetime = $created_at->toDateTimeImmutable();
        $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Taipei'));
        return $datetime;
    }
}
