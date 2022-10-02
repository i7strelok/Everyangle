<?php

namespace App\MediaTypes;

class MoviesMediaType extends AbstractMediaType{
    public function getMimeTypes(): array{
        return [
            'mp4' => 'video/mp4', //According to RFC 4337: rfc-editor.org/rfc/rfc4337.txt
        ];
    }

    public function getMediaTypeName(): string{
        return 'Movies';
    }

    public function play(string $filename){
        //Here all the code to play this movie file $filename
        return 'play.movies';
    }

    public function getImage(): string{
        return 'image2';
    }
}