<?php

namespace app\classes;

use Exception;
use app\interfaces\ValidateInterface;

class ValidateOnlyNumber implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_NUMBER_INT);

        if($string === ''){
            Flash::set($field, 'O campo deve ser um número inteiro');
            return false;
        }

        Old::set($field, $string);

        return $string;
    }
}