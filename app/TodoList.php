<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public function todos()
    {
        $this->hasMany('App\Todo');
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
