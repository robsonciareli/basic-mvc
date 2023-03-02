<?php

namespace app\controllers\site;

use app\controllers\admin\Serie as SerieAdmin;

class Serie extends SerieAdmin
{
    public array $data = [];
    public string $master = 'index.php';

    public function index(array $args)
    {
        $this->view = 'serie/index.php';
        parent::index($args);
    }
}