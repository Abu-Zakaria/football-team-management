<?php

namespace App;

use App\Traits\FutureTimeDifference;
use Illuminate\Database\Eloquent\Model;

class InjuredPlayer extends Model
{
    use FutureTimeDifference;

    protected $fillable = [
        'time',
        'relieved',
    ];

}
