<?php

namespace app\controllers\site;

use app\models\activerecord\Delete;
use Exception;
use app\models\User as UserModel;
use app\controllers\admin\User as UserAdmin;
use app\models\activerecord\FindBy;

class User extends UserAdmin
{
    public array $data = [];
    public string $master = 'index.php';

    public function index(array $args)
    {
        $this->view = 'index.php';
        parent::index($args);
    }
}