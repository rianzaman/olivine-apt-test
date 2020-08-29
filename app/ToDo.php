<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDo extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeGet_todos($query, $user)
    {
        return $query->withTrashed()->where('user_id', $user)->latest()->get();
    }
    
}
