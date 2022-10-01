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

    public function play(string $filename): string{
        return 'Playing Movie: '.$filename;
    }
}