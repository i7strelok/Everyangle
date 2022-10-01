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

    public function play(string $filename): string{
        return 'Playing Game: '.$filename;
    }
}