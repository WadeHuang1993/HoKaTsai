<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Carbon\Carbon;

class News extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'news';

    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
        'published_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected function asDateTime($value)
    {
        if (is_numeric($value)) {
            return Carbon::createFromTimestamp($value);
        }
        return parent::asDateTime($value);
    }
}
