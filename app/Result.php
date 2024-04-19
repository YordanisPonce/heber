<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'id_user',
        'id_task',
        'operation',
        'pages',
        'correctAnswer',
        'wrongAnswer',
        'status'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'id_task');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
