<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function todoList()
    {
        $this->belongsTo('App\TodoList');
    }
}
