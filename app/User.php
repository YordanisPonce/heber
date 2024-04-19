<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'id_degree',
        'password',
        'photo',
        'role',
        'status'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function degree()
    {
        return $this->belongsTo(Degree::class, 'id_degree');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'id_user');
    }

    public function familiars()
    {
        return $this->hasMany(Familiar::class, 'id_user');
    }
}
