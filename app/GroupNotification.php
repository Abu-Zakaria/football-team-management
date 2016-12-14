<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupNotification extends Model
{
    protected $fillable = [
        'seen',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
