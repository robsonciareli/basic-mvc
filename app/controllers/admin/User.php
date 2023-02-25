<?php

namespace app\controllers\admin;

use app\models\activerecord\Delete;
use app\models\activerecord\FindAll;
use Exception;
use app\models\User as UserModel;
use app\models\activerecord\FindBy;

class User
{
    public array $data = [];
    public string $view;
    public string $master = 'admin/index.php';

    public function index()
    {
        $users = (new UserModel)->execute(
            new FindAll(fields:'id, firstName, lastName')
        );
        
        $this->data = [
            'title' => 'Index User',
            'users' => $users,
        ];
        $this->view = 'admin/user/index.php';
    }

    public function show(array $args)
    {
        $user = (new UserModel)->execute(
            new FindBy(
                field:'id', 
                value:$args[0], 
                fields:'id, firstName, lastName, email'
            )
        );

        if(!$user){
            throw new Exception("Usuário não encontrado!");
        }
        
        $this->view = 'admin/user/user.php';
        $this->data = [
            'title' => 'User data',
            'user' => $user
        ];
    }

    public function delete(array $args)
    {
        (new UserModel)->execute(
            new Delete(
                field:'id', 
                value: $args[0]
            )
        );
        
        return redirect('/');
    }
}