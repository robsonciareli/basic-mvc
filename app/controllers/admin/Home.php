<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;

class Home implements ControllerInterface
{

    public string $view;
    public array $data = [];

    public function index(array $args)
    {
        $this->view = 'admin/home.php';
        $this->data = [
            'title' => 'Admin',
        ];

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