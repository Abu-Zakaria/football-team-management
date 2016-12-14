<?php
namespace App\UseCases;

use App\InjuredPlayer;
use App\Player;

class DeleteFitPlayers
{
    /**
     * @return bool
     */
    public static function perform()
    {
        $i_players = InjuredPlayer::where('relieved', 1)->get();

        foreach ( $i_players as $i_player )
        {
            $player = Player::where('id', $i_player->player_id)->first();
            $player->update([
                'injury' => 0,
            ]);

            $i_player->delete();
        }
        return true;
    }
}