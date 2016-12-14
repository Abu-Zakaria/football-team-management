<?php
namespace App\UseCases;

use App\InjuredPlayer;
use App\Player;

class GetSortedPlayers
{
	public static function perform()
	{
		$players = RoleChecker::perform();

		$gks  = $players['gks'];
		$defs = $players['defenses'];
		$mids = $players['midfields'];
		$atts = $players['attacks'];

		$players = [];

		foreach ($gks as $gk )
		{
			$players[] = $gk;
		}

		foreach ($defs as $def )
		{
			$players[] = $def;
		}

		foreach ($mids as $mid )
		{
			$players[] = $mid;
		}

		foreach ($atts as $att )
		{
			$players[] = $att;
		}

		return $players;

	}
}