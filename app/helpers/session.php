<?php

function welcome($index)
{
    if(isset($_SESSION[$index])){
        $user = $_SESSION[$index];

        return "Seja bem-vindo <strong>{$user->firstName} {$user->lastName}</strong>" . 
            "  <a class='btn btn-sm btn-secondary' 
            href='/login/destroy'>Logout</a>";
    }

    return 'Visitante';
}

function is_logged()
{
    return $_SESSION['user'] ?? null;
}