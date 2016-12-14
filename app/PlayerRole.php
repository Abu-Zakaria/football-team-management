<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerRole extends Model
{
	protected $fillable = [
		'player_id',
		'captain',
	];

    public function player()
    {
    	return $this->belongsTo(Player::class);
    }
}