<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoApp extends Model
{
    protected $table = 'todoapp';

    protected $fillable = ['user_id', 'content'];
}