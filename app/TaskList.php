<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    /* This is added because Lists
    was a protected keyword in PHP so I
    had to rename the model to TaskList after I already
    created the Lists table.
    */
    protected $table = 'Lists';
    protected $fillable = ['name', 'user_id', 'created_at', 'updated_at'];

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
