<?php

namespace App\MediaTypes;

enum MediaTypeEnum:string
{
    case Games = 'Games';
    case Movies = 'Movies';
    case Music = 'Music';


    public static function getAllValues(): array
    {
        return array_column(MediaTypeEnum::cases(), 'value');
    }
}
