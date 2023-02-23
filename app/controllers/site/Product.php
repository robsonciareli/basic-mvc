<?php

namespace app\controllers\site;

class Product
{
    public array $data = [];
    public string $view;
    public string $master = 'index.php';
    
    public function index(array $args)
    {
        $this->data = [
            'title' => 'Product'
        ];
        $this->view = 'product/index.php';
    }

    public function edit(array $args)
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'Edit'
        ];
    }
}
