<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class Member extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = 'members';

    protected $hidden = ['password'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username', 'password', 'status', 'level', 'gender', 'name', 'birthday', 'phone', 'email', 'address'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
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
