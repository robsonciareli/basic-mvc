<?php

namespace app\models;

use app\models\activerecord\ActiveRecord;
use app\models\activerecord\FindAll;

class Season extends ActiveRecord
{
    public $table = 'seasons';


    public function getSeasonsBySerie($serie)
    {
        $seasons = [];
        $seasons = $this->execute(
            new FindAll(
            byField: 'serie_id',
            value: $serie,
            fields: 'id, number, title'
        ));

        return $seasons;
    }

}