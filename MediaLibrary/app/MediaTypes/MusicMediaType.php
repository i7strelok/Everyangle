<?php

namespace App\MediaTypes;

class MusicMediaType implements MediaTypeInterface{
    public function getMimeTypes(): array{
        return [
            'mp3' => 'audio/mpeg', //According to RFC 3003: https://www.rfc-editor.org/rfc/rfc3003
        ];
    }

    public function getMediaTypeName(): string{
        return 'Music';
    }

    public function play(string $filename){
        //Here all the code to play this music file $filename
        return 'play.music';
    }

    public function getImage(): string{
        return 'image3';
    }
}