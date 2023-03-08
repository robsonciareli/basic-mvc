<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;
use app\models\activerecord\FindAll;
use app\models\User as User;

class Home implements ControllerInterface
{

    public string $view;
    public array $data = [];
    public string $master;
    public string $baseView = '/admin';

    public function index(array $args)
    {
        $users = (new User)->execute(
            new FindAll(fields:'id, firstName, lastName')
        );
        $this->data = [
            'title' => 'Admin',
            'users' => $users,
            'baseView'  => $this->baseView,
        ];
        $this->master = 'admin/index.php';
        $this->view = 'admin/home.php';
    }
    
    public function edit(array $args)
    {

    }
    
    public function show(array $args)
    {

    }
    
    public function update(array $args)
    {

    }
    
    public function store()
    {

    }
    
    public function destroy(array $args)
    {

    }
    
}