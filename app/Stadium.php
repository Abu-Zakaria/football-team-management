<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $table = 'stadiums';

    protected $fillable = [
        'name',
        'seats',
        'description',
        'under_construction',
        'picture',
    ];
}
