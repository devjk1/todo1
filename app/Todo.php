<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'description',
        'due_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function todoList()
    {
        return $this->belongsTo('App\TodoList');
    }
}
