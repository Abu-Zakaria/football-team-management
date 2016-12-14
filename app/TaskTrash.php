<?php

namespace App;

use App\Traits\FutureTimeDifference;
use Illuminate\Database\Eloquent\Model;

class TaskTrash extends Model
{
    use FutureTimeDifference;

    protected $fillable = [
        'name',
        'description',
        'time',
    ];
}
