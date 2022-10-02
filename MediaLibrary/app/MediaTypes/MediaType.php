<?php

namespace App\MediaTypes;

class MediaType{

    public static function getMediaTypes(): array {
        return [
            'Games' => new \App\MediaTypes\GamesMediaType,
            'Movies' => new \App\MediaTypes\MoviesMediaType,
            'Music' => new \App\MediaTypes\MusicMediaType,
        ];
    }
}