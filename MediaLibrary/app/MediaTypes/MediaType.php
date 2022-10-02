<?php

namespace App\MediaTypes;

class MediaType{

    /**
     * Return an array with all MediaTypes
     *
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     * @return array
     */ 
    public static function getMediaTypes(): array {
        return [
            'Games' => new \App\MediaTypes\GamesMediaType,
            'Movies' => new \App\MediaTypes\MoviesMediaType,
            'Music' => new \App\MediaTypes\MusicMediaType,
        ];
    }
}