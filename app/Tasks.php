<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'title',
        'content',
        'users_id',
        'archived_at'
    ];

    protected $dates = ['archived_at'];

    public function user() // każde zadanie należy do jednego użytkownika
    {
        return $this->belongsTo(User::class);
    }

    // some comment

}
