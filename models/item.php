<?php

$db_name = 'item';

class Item
{
    public $id;
    public $descricao;
    public $localizacao;
    public $latitude;
    public $longitude;

    private $in_db = false;

    public static function all() {
        global $db;
        global $db_name;

        return array_map('Item::instance', $db->all($db_name));
    }

    private static function instance($r) {
        return new Item($r->descricao, $r->localizacao, $r->latitude, $r->longitude, $r->id, true);
    }

    public static function findAllByField($field, $value) {
        global $db;
        global $db_name;

        return array_map('Item::instance', $db->findAllByField($db_name, $field, $value));
    }

    public function __construct($descricao, $localizacao, $latitude, $longitude, $id = NULL, $in_db = false) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->localizacao = $localizacao;
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $this->in_db = $in_db;
    }

    public function save() {
        global $db;
        global $db_name;

        $fields = getFields($this);
        array_shift($fields); // remove id

        try {
            if(!$this->in_db)
                $this->id = $db->insert($db_name, $fields);
            else
                $db->update($db_name, $fields, $this->getKeys());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getKeys() {
        return [
            'id' => $this->id
        ];
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
