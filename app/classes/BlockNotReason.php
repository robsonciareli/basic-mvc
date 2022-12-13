<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNotReason
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $blockMethod = Block::getMethodToBlock($controllerInterface, $blockMethods);

        if($blockMethod){

            BlockPostMethod::block();
            
            return redirect('/');
        }
    }
}