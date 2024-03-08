<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'id_user', 'id_task', 'operation', 'pages', 'correctAnswer', 'wrongAnswer', 'status'
    ];
}
