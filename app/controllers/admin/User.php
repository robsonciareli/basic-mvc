<?php

namespace app\controllers\admin;

use Exception;
use app\classes\Flash;
use app\classes\Validate;
use app\classes\BlockNotLogged;
use app\models\User as UserModel;
use app\models\activerecord\Delete;
use app\models\activerecord\Update;
use app\models\activerecord\FindAll;
use app\models\activerecord\FindById;
use app\interfaces\ControllerInterface;

class User implements ControllerInterface
{
    public array $data = [];
    public string $view = '';
    public string $master = 'admin/index.php';
    public string $baseView = '/admin/user';
    private ?UserModel $userModel = null;

    public function __construct()
    {
        BlockNotLogged::block($this, ['index', 'show', 'delete', 'edit', 'update', 'store']);
        $this->userModel = new UserModel();
    }

    public function index(array $args)
    {
        $users = $this->userModel->execute(
            new FindAll(fields:'id, firstName, lastName')
        );
        
        $this->data = [
            'title' => 'Lista de usuários',
            'users' => $users,
            'baseView'  => $this->baseView,
        ];
        $this->view = $this->view ?: 'admin/user/index.php';
    }

    public function show(array $args)
    {
        $user = $this->userModel->execute(
            new FindById(
                field:'id', 
                value:$args[0], 
                fields:'id, firstName, lastName, email',
                pdoFetchClass: get_class($this->userModel)
            )
        );

        if(!$user){
            throw new Exception("Usuário não encontrado!");
        }
        
        $this->view = 'admin/user/user.php';
        $this->data = [
            'title' => 'User data',
            'user' => $user,
            'baseView'  => $this->baseView,
        ];
    }

    public function delete(array $args)
    {
        $this->userModel->execute(
            new Delete(
                field:'id', 
                value: $args[0]
            )
        );
        
        return redirect('/admin/user/');
    }

    public function edit(array $args)
    {
        $user = $this->userModel->execute(
            new FindById(field:'id',
                value:$args[0],
                fields:'id, firstName, lastName, email',
                pdoFetchClass: get_class($this->userModel)
            )
        );
        
        if(!$user){
            throw new Exception("Usuário não encontrado!");
        }
        
        $this->view = 'admin/user/edit.php';
        $this->data = [
            'title' => 'Editar usuário',
            'user'  => $user,
            'baseView'  => $this->baseView,
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

        $user = $this->userModel;

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