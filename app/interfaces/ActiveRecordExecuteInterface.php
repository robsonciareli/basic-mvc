<?php

namespace app\interfaces;

use app\interfaces\ActiveRecordInterface;

interface ActiveRecordExecuteInterface
{
    public function execute(ActiveRecordInterface $activeRecordInterface);
}