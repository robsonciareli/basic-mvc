<?php

namespace app\core;

class FolderExtract
{
    public static function extract()
    {
        $uri = Uri::uri();
        $folder = '';

        if(isset($uri[0]) and $uri !== ''){
            return is_dir(strtolower(ROOT.'/'.CONTROLLER_PATH.$uri[0])) ? $uri[0] : '';
        }

        return $folder;
    }
}