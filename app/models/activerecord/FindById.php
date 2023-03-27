<?php

namespace app\models\activerecord;

use app\models\connection\Connection;
use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;
use PDO;

class FindById implements ActiveRecordExecuteInterface
{
    public function __construct(private string $field, private string|int $value, private string $fields = '*', private string $pdoFetchClass = 'stdClass')
    {
    }
    
    public function execute(ActiveRecordInterface $activeRecordInterface)
    {
        $query = $this->createQuery($activeRecordInterface);

        $connection = Connection::connect();
        
        $prepare = $connection->prepare($query);
        $prepare->execute([
            $this->field => $this->value
        ]);

        $result = $prepare->fetchAll(PDO::FETCH_CLASS, $this->pdoFetchClass);

        if(count($result) === 1){
            $result = array_reduce($result, function($e, $item){
                return $item;
            }, []);
        }

        return $result;
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        $sql = "SELECT {$this->fields} FROM {$activeRecordInterface->getTable()} WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
    
}