<?php

namespace app\classes;

class Images
{
    public $path_base = "images/";


    public function __construct(public string|null $image, public string $path = "")
    {
        
    }

    public function getImage() : string
    {
        return ($this->image ? $this->getPath() . $this->image : '');
    }

    private function getPath() : string 
    {
        return $this->path_base . $this->path;
    }
}