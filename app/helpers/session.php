<?php

function welcome($index)
{
    if(isset($_SESSION[$index])){
        $user = $_SESSION[$index];

        return "<spam class='mr-2'>Seja bem-vindo <strong>{$user->firstName} {$user->lastName}</strong></spam>" . 
            "  <a class='badge badge-danger font-weight-bold text-decoration-none' href='/login/destroy'>Logout</a>";
    }

    return '<a h="" class="">Visitante</a>';
}

function is_logged()
{
    return $_SESSION['user'] ?? null;
}

function idLoggedUser()
{
    return $_SESSION['user']->id;
}