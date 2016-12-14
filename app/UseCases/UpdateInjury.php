<?php
namespace App\UseCases;

use App\InjuredPlayer;

class UpdateInjury
{
    public static function perform($player)
    {
        $injury = InjuredPlayer::where('player_id', $player->id)->first();

        if ($injury)
        {
            if ( !$injury->getRemainTime('time') )
            {
                $injury->update([
                    'relieved' => 1,
                ]);
            }
        }
    }
}