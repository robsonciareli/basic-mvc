<?php

namespace app\controllers\admin;

use Exception;
use app\classes\Flash;
use app\classes\Validate;
use app\classes\BlockNotLogged;
use app\models\User as UserModel;
use app\models\activerecord\Delete;
use app\models\activerecord\FindBy;
use app\models\activerecord\Update;
use app\models\activerecord\FindAll;
use app\interfaces\ControllerInterface;

class User implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master = 'admin/index.php';

    public function __construct()
    {
        BlockNotLogged::block($this, ['index', 'show', 'delete', 'edit', 'update', 'store']);
    }

    public function index(array $args)
    {
        $users = (new UserModel)->execute(
            new FindAll(fields:'id, firstName, lastName')
        );
        
        $this->data = [
            'title' => 'Lista de usuários',
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
        
        return redirect('/admin/user/');
    }

    public function edit(array $args)
    {
        $user = (new UserModel)->execute(
            new FindBy(field:'id',
                value:$args[0],
                fields:'id, firstName, lastName, email'
            )
        );
        
        if(!$user){
            throw new Exception("Usuário não encontrado!");
        }
        
        $this->view = 'admin/user/edit.php';
        $this->data = [
            'title' => 'Editar usuário',
            'user'  => $user
        ];
    }

    public function update(array $args)
    {
        $validate = new Validate();
        $validate->handle([
            'id'        => [REQUIRED],
            'firstName' => [REQUIRED],
            'lastName' => [REQUIRED],
            'email' => [REQUIRED, EMAIL],
        ]);

        if($validate->errors){
            return redirect("/admin/user/edit/{$validate->data['id']}");
        }

        $user = (new UserModel);

        $user->firstName = $validate->data['firstName'];
        $user->lastName = $validate->data['lastName'];
        $user->email = $validate->data['email'];

        $created = $user->execute(new Update(field:'id', value:$validate->data['id']));

        if($created){
            Flash::set('created', "Usuário {$user->firstName} foi editado com sucesso!", "success");
            return redirect("/admin/user");
        }
    }

    public function store()
    {

    }

    public function destroy(array $args)
    {

    }
}