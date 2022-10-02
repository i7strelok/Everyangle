<?php

namespace App\MediaTypes;

//Interface
interface MediaTypeInterface{

    //Force Implementing the following methods
    public function getMimeTypes(): array;
    public function getMediaTypeName(): string;
    public function getImage(): string;
    public function play(string $filename);

}