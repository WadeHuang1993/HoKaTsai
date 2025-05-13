<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use MongoDB\BSON\UTCDateTime;

class Course extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'courses';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'location',
        'image',
        'description',
        'team_member_id',
        'schedule',
        'max_participants',
        'remaining_slots',
        'price',
        'notes',
        'google_form_url'
    ];

    protected $casts = [
        'schedule' => 'array',
        'notes' => 'array',
        'max_participants' => 'integer',
        'remaining_slots' => 'integer',
        'price' => 'integer',
        'created_at' => 'immutable_datetime',
        'updated_at' => 'immutable_datetime',
        'deleted_at' => 'immutable_datetime'
    ];

    public function getStartDateAttribute(UTCDateTime $start_date)
    {
        $datetime = $start_date->toDateTimeImmutable();
        $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Taipei'));
        return $datetime;
    }

    public function setStartDateAttribute($value)
    {
        if ($value instanceof \DateTimeInterface) {
            $this->attributes['start_date'] = new UTCDateTime($value->getTimestamp() * 1000);
        } else {
            $timestamp = strtotime($value);
            if ($timestamp === false) {
                throw new \InvalidArgumentException('Invalid date format');
            }
            $this->attributes['start_date'] = new UTCDateTime($timestamp * 1000);
        }
    }

    public function getEndDateAttribute(UTCDateTime $end_date)
    {
        $datetime = $end_date->toDateTimeImmutable();
        $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Taipei'));
        return $datetime;
    }

    public function setEndDateAttribute($value)
    {
        if ($value instanceof \DateTimeInterface) {
            $this->attributes['end_date'] = new UTCDateTime($value->getTimestamp() * 1000);
        } else {
            $timestamp = strtotime($value);
            if ($timestamp === false) {
                throw new \InvalidArgumentException('Invalid date format');
            }
            $this->attributes['end_date'] = new UTCDateTime($timestamp * 1000);
        }
    }

    public function getCreatedAtAttribute(UTCDateTime $created_at)
    {
        $datetime = $created_at->toDateTimeImmutable();
        $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Taipei'));
        return $datetime;
    }

    public function teamMember()
    {
        return $this->belongsTo(
            related: TeamMember::class,
            foreignKey: 'team_member_id',
            otherKey: '_id'
        );
    }
}
