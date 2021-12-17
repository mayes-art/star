<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $dates = ['deleted_at'];
    
    protected $hidden = ['password'];

    protected $fillable = ['email', 'account', 'password', 'nickname', 'role_id', 'status'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }

    public function getLastLoginAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }
}
