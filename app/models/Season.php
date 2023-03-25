<?php

namespace app\models;

use app\models\activerecord\ActiveRecord;
use app\models\activerecord\FindAll;

class Season extends ActiveRecord
{
    public $table = 'seasons';


    public function getSeasonsBySerie(Serie $serie): array
    {
        $seasons = [];
        $seasons = $this->execute(
            new FindAll(
            byField: 'serie_id',
            value: $serie->id,
            fields: 'id, number, title',
            pdoFetchClass: __CLASS__
        ));

        return $seasons;
    }

}