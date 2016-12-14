<?php

namespace App\Http\Controllers\Web;

use App\Player;
use App\FreeKick;
use App\TeamFormation;
use App\CornerKick;
use App\PlayerRole;
use App\TeamFormat;
use Illuminate\Http\Request;
use App\UseCases\RoleChecker;
use App\Http\Controllers\Controller;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $players = Player::all();

        $roles = RoleChecker::perform();

        $freeKickers = FreeKick::all();

        $cornerKickers = CornerKick::all();

        $formation     =  TeamFormation::first();

        $gks       = $roles['gks'];
        $defenses  = $roles['defenses'];
        $midfields = $roles['midfields'];
        $attacks   = $roles['attacks'];

        $captain = PlayerRole::first();

        return view('manager.formations.index', compact('players', 'captain', 'gks', 'midfields', 'defenses', 'attacks', 'freeKickers', 'cornerKickers', 'formation'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'def'   => 'required|max:2',
            'mid'   => 'required|max:2',
            'att'   => 'required|max:2',
        ]);

        $def = $request->def;
        $mid = $request->mid;
        $att = $request->att;

        $total = $def + $mid + $att;

        if ( $total != 10 )
        {
            return back()->with('info', 'Your Format Was Invalid!');
        }

        $formation = TeamFormation::first();

        $format    = "$def-$mid-$att";

        if ( $formation )
        {
            $formation->update([
                'formation' => $format,
            ]);
        }else
        {
            $formation = new TeamFormation;

            $formation->formation = $format;

            $formation->save();
        }

        return back()->with('info', 'Format Saved!');

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
