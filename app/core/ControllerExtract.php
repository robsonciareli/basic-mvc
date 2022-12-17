<?php

namespace app\core;

use Exception;

class ControllerExtract
{
    
    public static function extract()
    {
        $uri = Uri::uri();
        $folder = FolderExtract::extract($uri);

        if($folder){
            $controller = Uri::uriExist($uri, 1);
            $namespaceAndController = "app\\controllers\\{$folder}\\";
        } else {
            $controller = Uri::uriExist($uri, 0);
            $namespaceAndController = "app\\controllers\\".CONTROLLER_FOLDER_DEFAULT."\\";
        }

        $controller = $controller ?? CONTROLLER_DEFAULT;

        $controller = $namespaceAndController.ucfirst($controller);
        // var_dump($controller);die();
        if(class_exists($controller)){
            return $controller;
        }

        throw new Exception("message: Controller {$controller} não existe.");
    }
}