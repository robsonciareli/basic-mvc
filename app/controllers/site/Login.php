<?php

namespace app\controllers\site;


use app\models\User;
use app\classes\Flash;
use app\classes\BlockNotLogged;
use app\classes\BlockNotReason;
use app\models\activerecord\FindBy;
use app\interfaces\ControllerInterface;

class Login implements ControllerInterface
{
    public array $data = [];
    public string $view;
    public string $master = 'index.php';

    public function __construct()
    {
        BlockNotLogged::block($this, ['edit', 'show']);
    }

    public function index(array $args)
    {
        $this->view = 'login.php';
        $this->data = [
            'title' => 'Login',
        ];
    }

    public function store()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $user = new User;
        $userFound = $user->execute(new FindBy(field:'email', value: $email, fields:'firstName, lastName, password'));

        if(!$userFound){
            Flash::set('login', 'Usuário ou senha inválidos');
            return redirect('/login');
        }

        $passwordMatch = password_verify($password, $userFound->password);

        if(!$passwordMatch){
            Flash::set('login', 'Usuário ou senha inválidos');
            return redirect('/login');
        }

        unset($userFound->password);

        $_SESSION['user'] = $userFound;

        return redirect('/');
    }

    public function destroy(array $args)
    {
        session_destroy();

        return redirect('/');
    }

    public function show(array $args)
    {

    }

    public function update(array $args)
    {

    }

    public function edit(array $args)
    {

    }

}