<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class ServiceFee extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'service_fees';

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'price',
        'order',
    ];

    public $timestamps = true;
} 