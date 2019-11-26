<?php

class Database
{
    private $host = 'localhost';
    private $user = 'postgres';
    private $password = 'password';
    private $dbname = 'bd_proj_3';
    public $connection;

    public function __construct() {
        $dsn = "pgsql:host={$this->host};dbname={$this->dbname}";
        //$dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        try {
            $this->connection = new PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            error_log($e->getMessage());
            exit('Something weird happened'); //something a user can understand
        }
    }

    public function all($table) {
        $query = $this->connection->query("SELECT * FROM $table");
        return $query->fetchAll();
    }

    public function findAllByField($table, $field, $value) {
        $query = $this->connection->prepare("SELECT * FROM $table WHERE $field = ?");
        $query->execute([$value]);
        return $query->fetchAll();
    }

    public function insert($table, $fields, $has_id = true) {
        $fieldnames = implode(',', array_keys($fields));
        $fieldvalues = implode(',', array_map(function ($a) { return '?'; }, $fields));
        $sql = "INSERT INTO $table ($fieldnames) VALUES ($fieldvalues)";
        $query = $this->connection->prepare($sql);
        $query->execute(array_values($fields));
        if($has_id)
            return $this->connection->lastInsertId();
    }

    public function update($table, $fields, $keys) {
        $fieldnames = implode(',', array_map(function ($a) { return "$a = ?"; }, array_keys($fields)));
        $keynames = implode(' AND ', array_map(function ($a) { return "$a = ?"; }, array_keys($keys)));
        $sql = "UPDATE $table SET $fieldnames WHERE $keynames";
        $query = $this->connection->prepare($sql);
        $query->execute(array_merge(array_values($fields), array_values($keys))); // join values to keys
    }

    public function delete($table, $fields) {
        $fieldnames = implode(' AND ', array_map(function ($a) { return "$a = ?"; }, array_keys($fields)));
        $sql = "DELETE FROM $table WHERE $fieldnames";
        $query = $this->connection->prepare($sql);
        $query->execute(array_values($fields));
    }
}

$db = new Database();