<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'description', 'due_date', 'task_list_id', 'created_at', 'updated_at'];

    public function task_list() {
        return $this->belongsTo('App\TaskList');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
