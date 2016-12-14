<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskActivity extends Model
{
    protected $fillable = [
         'task_id',
         'activity',
    ];
}
