<?php

namespace app\controllers\site;

use Exception;
use app\models\User as UserModel;
use app\models\activerecord\FindBy;

class User
{
    public array $data = [];
    public string $view;
    public string $master = 'index.php';

    public function index()
    {
        $this->data = [
            'title' => 'Index User',
        ];
        $this->view = 'edit.php';
    }

    public function show(array $args)
    {
        $user = (new UserModel)->execute(new FindBy(field:'id', value:$args[0], fields:'id, firstName, lastName'));

        if(!$user){
            throw new Exception("Usuário não encontrado!");
        }
        
        $this->view = 'user.php';
        $this->data = [
            'title' => 'User data',
            'user' => $user
        ];
    }
}