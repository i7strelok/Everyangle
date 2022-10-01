<?php

namespace App\MediaTypes;

class MusicMediaType extends AbstractMediaType{
    public function getMimeTypes(): array{
        return [
            'mp3' => 'audio/mpeg', //According to RFC 3003: https://www.rfc-editor.org/rfc/rfc3003
        ];
    }

    public function getMediaTypeName(): string{
        return 'Music';
    }

    public function play(string $filename): string{
        return 'Playing Music: '.$filename;
    }
}