<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use MongoDB\BSON\UTCDateTime;

class TeamMember extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'team_members';

    protected $fillable = [
        'name',
        'title',
        'image',
        'specialties',
        'work_experience',
        'self_introduction',
        'education',
        'show_in_homepage'
    ];

    protected $casts = [
        'show_in_homepage' => 'boolean',
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
