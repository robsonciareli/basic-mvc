<?php

use app\classes\Flash;

function flash($key)
{
    $flash = Flash::get($key);

    if(isset($flash['message'])){
        return "<span class='alert alert-{$flash['alert']} mb-1 mt-1 p-1 pl-2 col-12'>{$flash['message']}</span>";
    }
}