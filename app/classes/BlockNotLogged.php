<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNotLogged
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $blockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        if(!isset($_SESSION['user']) and $blockMethod){

            BlockPostMethod::block();

            return redirect('/');
        }
    }
}