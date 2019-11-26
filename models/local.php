<?php

require_once '../utils.php';

$db_name = 'local_publico';

class Local
{
    public $nome;
    public $latitude;
    public $longitude;

    private $in_db = false;

    public static function all() {
        global $db;
        global $db_name;

        return array_map('Local::instance', $db->all($db_name));
    }

    private static function instance($r) {
        return new Local($r->nome, $r->latitude, $r->longitude, true);
    }

    public static function findAllByField($field, $value) {
        global $db;
        global $db_name;

        return array_map('Local::instance', $db->findAllByField($db_name, $field, $value));
    }

    public function __construct($nome, $latitude, $longitude, $in_db = false) {
        $this->nome = $nome;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->in_db = $in_db;
    }

    public function getKeys() {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }

    public function save() {
        global $db;
        global $db_name;

        $fields = getFields($this);

        try {
            if(!$this->in_db)
                $db->insert($db_name, $fields, false);
            else
                $db->update($db_name, $fields, $this->getKeys());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete() {
        global $db;
        global $db_name;

        $db->delete($db_name, $this->getKeys());
        $this->id = NULL;
    }

    public function show() {
        $fields = getFields($this);
        echo '<p>'.implode(', ', array_map(function ($v, $k) { return "$k: $v"; }, $fields, array_keys($fields))).'</p>';
    }
}
