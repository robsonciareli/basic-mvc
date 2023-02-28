<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;
use app\models\activerecord\FindAll;
use app\models\activerecord\FindBy;
use app\models\Products as ProductModel;

class Product implements ControllerInterface
{
    public string $view = '';
    public array $data = [];
    public string $master = 'admin/index.php';

    public function index(array $args)
    {
        $products = (new ProductModel)->execute(
            new FindAll()
        );
        
        $this->view = $this->view ?: 'admin/product/index.php';
        $this->data = [
            'title'     => 'Lista de produtos',
            'products'  => $products
        ];
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
        $product = (new ProductModel)->execute(
            new FindBy(
                field:'id',
                value: $args[0],
                fields:'descricao, categoria'
            )
        );

        $this->view = 'admin/product/product.php';
        $this->data = [
            'title' => 'Visualizar produto',
            'product'   => $product
        ];
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