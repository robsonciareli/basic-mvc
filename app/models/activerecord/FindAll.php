<?php

namespace app\models\activerecord;

use Throwable;
use app\models\connection\Connection;
use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;

class FindAll implements ActiveRecordExecuteInterface
{
    public function __construct(private string $fields = '*')
    {
    }
    
    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        try{
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $prepare = $connection->prepare($query);
            $prepare->execute();
            
            return $prepare->fetchAll();
        } catch(Throwable $throw){
            var_dump($throw);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        return $sql = "SELECT {$this->fields} FROM {$activeRecordInterface->getTable()}";
    }
    
}