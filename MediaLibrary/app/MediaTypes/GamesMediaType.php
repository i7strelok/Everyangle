<?php

namespace App\MediaTypes;
class GamesMediaType extends AbstractMediaType{
    public function getMimeTypes(): array{
        return [
            'swf' => 'application/x-shockwave-flash',
        ];
    }

    public function getMediaTypeName(): string{
        return 'Games';
    }

    public function play(string $filename){
        //Here all the code to play this game file $filename
        return 'play.games';
    }

    public function getImage(): string{
        return 'image1';
    }
}