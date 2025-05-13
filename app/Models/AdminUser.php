<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class AdminUser extends Model implements AuthenticatableContract
{
    use Authenticatable, SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'admin_users';
    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
} 