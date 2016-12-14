<?php

namespace App\Http\Controllers\Manager;

use App\Role;
use App\Player;
use App\InjuredPlayer;
use App\UseCases\Trimmer;
use Illuminate\Http\Request;
use App\UseCases\ImageUpload;
use App\UseCases\UpdateInjury;
use App\UseCases\DeleteFitPlayers;
use App\Http\Controllers\Controller;

class ManagePlayersController extends Controller
{
    public function index()
    {
		DeleteFitPlayers::perform();

		$players = Player::orderBy('weekly_wages', 'desc')->get();

    	return view('manager.players', compact('players'));
    }

    public function create()
    {
    	$roles = Role::all();

    	return view('manager.add.player', compact('roles'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
			'jersey_no'  => 'required|unique:players',
			'first_name' => 'required|min:2',
			'last_name'  => 'required|min:2',
			'wages'		 => 'required|min:2',
			'skills'		 => 'required|min:3',
    	]);

		$pic_name = null;

		if ($_FILES['photo']['name'])
		{
			$pic_name = time() . $_FILES['photo']['name'];

			ImageUpload::perform('photo', 'uploads/players', $pic_name);
		}

		$player = new Player;

		$player->first_name 	= $request->first_name;
    	$player->last_name  	= $request->last_name;
    	$player->jersey_no  	= $request->jersey_no;
    	$player->role_id      	= $request->roles;
    	$player->weekly_wages 	= $request->wages;

    	$skills = Trimmer::perform($request->skills);

    	$player->skills = $skills;

		if ( $pic_name )
		{
			$player->picture = $pic_name;
		}

    	$player->save();

    	return redirect('/manage/players');
    }

	/**
	 * @param Player $player
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function show(Player $player)
	{
		$injury = InjuredPlayer::where([
			'player_id' => $player->id,
			'relieved'	=> 0,
		])->first();

		UpdateInjury::perform($player);

		DeleteFitPlayers::perform();

		return view('manager.view.player', compact('player', 'injury'));
	}

	public function edit(Player $player)
	{
		$roles = Role::all();

		return view('manager.update.player', compact('player', 'roles'));
	}

	public function update(Request $request, Player $player)
	{
		$this->validate($request, [
			'jersey_no'  => 'required',
			'first_name' => 'required|min:2',
			'last_name'  => 'required|min:2',
			'wages'		 => 'required|min:2',
			'skills'     => 'required',
			'role'       => 'required',
			'stamina'    => 'required',
		]);

		$players = Player::all();

		foreach($players as $another_player )
		{

			if ( $request->jersey_no == $another_player->jersey_no && $another_player->id != $player->id )
			{
				return back()->with('jersey_no', 'The Jersey Number has been used already!' );
			}

		}

		if ( $request->injury == 'on' )
		{
			$injury = true;
		}else
		{
			$injury = false;
		}

		$pic_name = null;

		if ($_FILES['photo']['name'])
		{
			$pic_name = time() . $_FILES['photo']['name'];
			ImageUpload::perform('photo', 'uploads/players', $pic_name);
		}

		$player->update([
			'jersey_no'     => $request->jersey_no,
			'first_name'    => $request->first_name,
			'last_name'     => $request->last_name,
			'weekly_wages'  => $request->wages,
			'role_id'       => $request->role,
			'skills'        => $request->skills,
			'injury'        => $injury,
			'stamina'		=> $request->stamina,
		]);

		if ( $pic_name )
		{
			$player->update([
				'picture'       => $pic_name,
			]);
		}

		if ( !$player->injury )
		{
			InjuredPlayer::where('player_id', $player->id)->delete();
		}

		return redirect('/manage/view/player/'. $player->id);

	}


}
