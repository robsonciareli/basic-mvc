<?php

namespace app\models;

use app\models\Season;
use app\models\activerecord\ActiveRecord;

class Serie extends ActiveRecord
{
    protected $table = 'series';

    public function getSeasons(): array
    {
        return (new Season)->getSeasonsBySerie($this);
    }
}