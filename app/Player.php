<?php

namespace App;

use App\Presenters\PlayersPresenter;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	protected $fillable = [
		'jersey_no',
		'first_name',
		'last_name',
		'weekly_wages',
		'picture',
		'skills',
		'role_id',
		'injury',
		'stamina',
	];

	public function cornerKick()
	{
		$id = $this->id;

		$cornerKick = CornerKick::where('player_id', $id)->first();

		if ( $cornerKick )
		{
			return true;
		}
		return false;
	}	

	public function freeKick()
	{
		$id = $this->id;

		$freeKick = FreeKick::where('player_id', $id)->first();

		if ( $freeKick )
		{
			return true;
		}
		return false;
	}

	public function captain()
	{
		$captain = PlayerRole::first();

		return ($captain->player_id == $this->id )? true : false;
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function present()
	{
		return (new PlayersPresenter($this));
	}

	public static function fitPlayers()
	{
		$players = self::where('stamina', 100)->get();

		return self::count($players);
	}

	public static function injuredPlayers()
	{
		$players = self::where('injury', 1)->get();

    	return self::count($players);
	}

	public static function totalPlayers()
    {
    	$players = self::all();

    	return self::count($players);
    }

    private static function count($players)
    {
    	$x = 0;
    	if (!empty($players))
    	{
	    	foreach( $players as $player )
	    	{
	    		$x++;
	    	}
    	}
    	return $x;
    }
    
}