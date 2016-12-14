<?php

namespace App\UseCases;


class Trimmer
{
    public static function perform(string $string)
    {
        $array = explode(',', $string);

        foreach ($array as $item)
        {
            trim($item);
        }

        $string = implode(',', $array);

        return $string;
    }
}