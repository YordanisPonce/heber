<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'id_degree',
        'operation',
        'pages',
        'figure_1',
        'figure_2',
        'figure_3',
        'figure_4',
        'description',
        'photo',
        'status'
    ];

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'id_degree');
    }


    public function results()
    {

        return $this->hasMany(Result::class, 'id_task', 'id');
    }

}
