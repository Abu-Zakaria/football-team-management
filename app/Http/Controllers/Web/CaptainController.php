<?php

namespace App\Http\Controllers\Web;

use App\Player;
use App\PlayerRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaptainController extends Controller
{
    public function edit()
    {
    	$captain = PlayerRole::first();

    	$players = Player::orderBy('weekly_wages', 'desc')->get();

    	return view('manager.add.captain', compact('captain', 'players'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'captain'  => 'required',
    	]);

    	$player  = $request->captain;

    	$captain = PlayerRole::first();

    	if ($captain)
    	{
    		$captain->update([
    			'player_id' => $player,
    		]);

    		return redirect('/manage/formation');
    	}

    	$role = new PlayerRole;

    	$role->player_id = $player;
    	$role->captain 	 = 1;

    	$role->save();

    	return redirect('/manage/formation');
    }
}