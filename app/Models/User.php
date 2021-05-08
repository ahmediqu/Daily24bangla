<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

//    some common accessor

    protected $appends = ['name_email'];

//    public function getNameAttribute($value)
//    {
//        return 'This is my name : '.$value;
//    }

    public function getNameEmailAttribute() {
        return "{$this->name}-{$this->email}";
    }


    protected static function booted()
    {

    }



    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d',
    ];
}
