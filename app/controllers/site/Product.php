<?php

namespace app\controllers\site;

use app\controllers\admin\Product as ProductAdmin;

class Product extends ProductAdmin
{
    public array $data = [];
    public string $master = 'index.php';
    
    public function index(array $args)
    {
        $this->view = 'product/index.php';
        parent::index($args);
    }
}
