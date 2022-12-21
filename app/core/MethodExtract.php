<?php

namespace app\core;

class MethodExtract
{
    public static function extract($controller)
    {
        $uri = Uri::uri();
        $folder = FolderExtract::extract($uri);

        $method = (!$folder) ?
            Uri::uriExist($uri, 1):
            Uri::uriExist($uri, 2);

        $method = ($method !== null) ? 
            mb_strtolower($method) : 
            'index';
        
        if(!method_exists($controller, $method)){
            $method = 'index';
            $sliceIndexStartFrom = (!$folder) ? 1 : 2;
        }
        else{
            $sliceIndexStartFrom = (!$folder) ? 2 : 3;
        }

        return [
            $method,
            $sliceIndexStartFrom
        ];
    }
}