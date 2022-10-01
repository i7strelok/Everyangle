<?php

namespace App\MediaTypes;

use Illuminate\Support\Facades\Storage;

//Abstract Class
abstract class AbstractMediaType{

    //Force Extending class to define the following methods
    abstract protected function getMimeTypes(): array;
    abstract protected function getMediaTypeName(): string;
    abstract protected function play(string $filename): string;
    /**
     * Check the Mime Type of a file given its name
     *
     * @param string   $filename  name of the file whose mimetype should be detected
     * 
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     * @return bool
     */ 
    public function checkFileType(string $filename): bool{
        if (Storage::exists($filename)){
            $mimeTypes = $this->getMimeTypes();
            $mimeType = Storage::mimeType($filename);
            if (in_array($mimeType, $mimeTypes)) {
                return true;
            }
        }
        return false;
    }

    public static function getMediaTypes(): array {
        return [
            'Games' => new \App\MediaTypes\GamesMediaType,
            'Movies' => new \App\MediaTypes\MoviesMediaType,
            'Music' => new \App\MediaTypes\MusicMediaType,
        ];
    }
}