<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CornerKick extends Model
{
    public function player()
    {
    	return $this->belongsTo(Player::class);
    }
}