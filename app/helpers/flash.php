<?php

use app\classes\Flash;

function flash($key)
{
    $flash = Flash::get($key);

    if(isset($flash['message'])){
        return "<span class='alert alert-{$flash['alert']} w-100 py-1 mt-2 mb-0 row mx-0'>{$flash['message']}</span>";
    }
}