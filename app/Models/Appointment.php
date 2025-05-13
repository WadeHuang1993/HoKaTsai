<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use MongoDB\BSON\UTCDateTime;

class Appointment extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'appointments';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public $timestamps = true;


    public function getCreatedAtAttribute(UTCDateTime $created_at)
    {
        $datetime = $created_at->toDateTimeImmutable();
        $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Taipei'));
        return $datetime;
    }
}
