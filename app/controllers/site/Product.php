<?php

namespace app\controllers\site;

use app\models\activerecord\FindAll;
use app\models\Products as ProductsModel;

class Product 
{
    public array $data = [];
    public string $view;
    public string $master = 'index.php';
    
    public function index(array $args)
    {
        $products = (new ProductsModel)->execute(
            new FindAll()
        );

        $this->data = [
            'title' => 'Produtos',
            'products'  => $products
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
