<?php

namespace app\models;

use app\models\activerecord\ActiveRecord;

class Product extends ActiveRecord
{
    protected $table = 'products';
}