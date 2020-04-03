<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = [
        'title',
    ];

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
