<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'description', 'due_date', 'list_id', 'created_at', 'updated_at'];
}
