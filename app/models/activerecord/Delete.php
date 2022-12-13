<?php

namespace app\models\activerecord;

use Exception;
use Throwable;

use app\models\connection\Connection;
use app\interfaces\ActiveRecordInterface;
use app\interfaces\ActiveRecordExecuteInterface;

class Delete implements ActiveRecordExecuteInterface
{
    public function __construct(private string $field, private string|int $value)
    {
    }

    public function execute(ActiveRecordInterface $activeRecordInterface){
        try{
            $query = $this->createQuery($activeRecordInterface);

            $attributes = [$this->field => $this->value];

            $connection = Connection::connect();
            
            $prepare = $connection->prepare($query);
            return $prepare->execute($attributes);
        } catch (Throwable $throw){
            formatException($throw);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if($activeRecordInterface->getAttributes()){
            throw new Exception('Para deletar não precisa passar atributos');
        }
        $sql = "DELETE FROM {$activeRecordInterface->getTable()} WHERE {$this->field} = :{$this->field}";
        return $sql;
    }
}