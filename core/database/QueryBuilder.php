<?php

namespace App\Core\Database;

use PDO;
use Exception;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo, $logger = null)
    {
        $this->pdo = $pdo;
        $this->logger = ($logger) ? $logger : null;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function select($table,$to,$tp)
    {
        $statement = $this->pdo->prepare("select * from {$table} where tipo_operacion = :to AND tipo_propiedad = :tp");
        $statement->bindValue(':to', $to, PDO::PARAM_STR);
        $statement->bindValue(':tp', $tp, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $parameters = $this->cleanParameterName($parameters);
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            $this->sendToLog($e);
        }
    }

    public function buscarUser($table, $parameters)
    {
        $parameters = $this->cleanParameterName($parameters);

        $statement = $this->pdo->prepare("select * from {$table} where mail='{$parameters['mail']}' and pass='{$parameters['pass']}' ");
        $statement->execute();
        $statement->fetchAll(PDO::FETCH_CLASS);

        if($statement->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function GetUser($table, $parameters)
    {
        $parameters = $this->cleanParameterName($parameters);

        $statement = $this->pdo->prepare("select * from {$table} where mail= :mail and pass= :pass ");
        $statement->bindValue(':mail', $parameters['mail'], PDO::PARAM_STR);
        $statement->bindValue(':pass', $parameters['pass'], PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function UpdateUser($table,$parameters){
        $parameters = $this->cleanParameterName($parameters);
        $statement = $this->pdo->prepare("update {$table} set nombre=:nombre,
                                                                apellido=:apellido,
                                                                telefono=:telefono,
                                                                pass=:newpass where mail= :mail and pass= :pass ");

        $statement->bindValue(':mail', $parameters['mail'], PDO::PARAM_STR);
        $statement->bindValue(':pass', $parameters['pass'], PDO::PARAM_STR);

        $statement->bindValue(':nombre', $parameters['nombre'], PDO::PARAM_STR);
        $statement->bindValue(':apellido', $parameters['apellido'], PDO::PARAM_STR);
        $statement->bindValue(':telefono', $parameters['telefono'], PDO::PARAM_STR);
        $statement->bindValue(':newpass', $parameters['pass'], PDO::PARAM_STR);

        $statement->execute();
    }

    private function sendToLog(Exception $e)
    {
        if ($this->logger) {
            $this->logger->error('Error', ["Error" => $e]);
        }
    }

    /**
     * Limpia guiones - que puedan venir en los nombre de los parametros
     * ya que esto no funciona con PDO
     *
     * Ver: http://php.net/manual/en/pdo.prepared-statements.php#97162
     */
    private function cleanParameterName($parameters)
    {
        $cleaned_params = [];
        foreach ($parameters as $name => $value) {
            $cleaned_params[str_replace('-', '', $name)] = $value ;
        }
        return $cleaned_params;
    }
}
