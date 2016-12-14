<?php
namespace App\UseCases;

use App\Player;
use App\InjuredPlayer;

class RoleChecker
{

	public static function perform()
	{
		$gks	   = [];
		$defenses  = [];
		$midfields = [];
		$attacks   = [];

		$players = Player::all();

		foreach ( $players as $player )
        {
            if ($player->role->name == 'GK')
            {
                $gks[] = $player;
            }

            if ( $player->role->name == 'CB' )
            {
                $defenses[] = $player;
            }

            if ( $player->role->name == 'RB' )
            {
                $defenses[] = $player;
            }

            if ( $player->role->name == 'LB' )
            {
                $defenses[] = $player;
            }

            if ( $player->role->name == 'CM' )
            {
                $midfields[] = $player;
            }

            if ( $player->role->name == 'CAM' )
            {
                $midfields[] = $player;
            }

            if ( $player->role->name == 'CDM' )
            {
                $midfields[] = $player;
            }

            if ( $player->role->name == 'RM' )
            {
                $midfields[] = $player;
            }

            if ( $player->role->name == 'LM' )
            {
                $midfields[] = $player;
            }

            if ( $player->role->name == 'LW' )
            {
                $attacks[] = $player;
            }

            if ( $player->role->name == 'RW' )
            {
                $attacks[] = $player;
            }

            if ( $player->role->name == 'ST' )
            {
                $attacks[] = $player;
            }

        }

        return $roles = [
        	'gks' => $gks,
        	'defenses' => $defenses,
        	'midfields' => $midfields,
        	'attacks' => $attacks,
        ];

	}

}