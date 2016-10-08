<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table = 'Lists';

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
