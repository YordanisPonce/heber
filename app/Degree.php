<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'status'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
