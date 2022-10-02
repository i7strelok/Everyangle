<?php

namespace App\MediaTypes;

use Illuminate\Support\Facades\Storage;

//Interface
interface MediaTypeInterface{

    //Force Extending class to define the following methods
    public function getMimeTypes(): array;
    public function getMediaTypeName(): string;
    public function getImage(): string;
    public function play(string $filename);
    
    /**
     * Check the Mime Type of a file given its name
     *
     * @param string   $filename  name of the file whose mimetype should be detected
     * 
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     * @return bool
     */ 
}