<?php

namespace App\Http\Controllers\Manager;

use App\InjuredPlayer;
use App\Player;
use App\UseCases\UpdateInjury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageInjuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Player $player)
    {
        UpdateInjury::perform($player);

        $injury = InjuredPlayer::where('player_id', $player->id)->first();

        return view('manager.set.injury_time', compact('player', 'injury'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Player $player)
    {
        $injured_players = InjuredPlayer::where('player_id', $player->id)->first();

        if ( !count( $injured_players ) )
        {
            $injured = new InjuredPlayer;

            $injured->player_id  = $player->id;
            $injured->time       = $request->time;

            $injured->save();
        }else
        {
            $injured_players->update([
                'time' => $request->time,
            ]);
        }

        return redirect('/manage/view/player/'. $player->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
