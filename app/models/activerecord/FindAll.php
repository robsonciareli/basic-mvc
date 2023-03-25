<?php

namespace app\models\activerecord;

use PDO;
use Throwable;
use app\models\connection\Connection;
use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;

class FindAll implements ActiveRecordExecuteInterface
{
    public function __construct(private string $fields = '*', private string|null $byField = null, private string|int|null $value = null, private string $pdoFetchClass = 'stdClass')
    {
    }
    
    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        try{
            $query = $this->createQuery($activeRecordInterface);

            $connection = Connection::connect();

            $prepare = $connection->prepare($query);
            $prepare->execute();
            
            return $prepare->fetchAll(PDO::FETCH_CLASS, $this->pdoFetchClass);
        } catch(Throwable $throw){
            var_dump($throw);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        return $sql = "SELECT {$this->fields} FROM {$activeRecordInterface->getTable()} {$this->getWhere()}";
    }

    private function getWhere(){
        $string = '';
        if(!is_null($this->byField)){
            $string = " AND {$this->byField} = {$this->value}";
        }
        return " WHERE 1=1 {$string}";
    }
    
}