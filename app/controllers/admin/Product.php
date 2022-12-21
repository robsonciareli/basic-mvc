<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;

class Product implements ControllerInterface
{
    public string $view;
    public array $data = [];
    public string $master;

    public function index(array $args)
    {
        // var_dump($args);
        // die();
    }

    public function edit(array $args)
    {
        $this->data = [
            'title' => 'Edit Product',
        ];
        $this->view = 'admin/edit.php';
        $this->master = 'admin/index.php';
        
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