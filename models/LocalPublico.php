<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';


class LocalPublico extends Model
{
    public $nome;
    public $latitude;
    public $longitude;

    protected $in_db = false;
    const db_name = 'local_publico';

    protected static function instance($r) {
        return new self($r->nome, $r->latitude, $r->longitude, true);
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

        $fields = getFields($this);

        try {
            if(!$this->in_db)
                $db->insert($this::db_name, $fields, false);
            else
                $db->update($this::db_name, $fields, $this->getKeys());

            return NULL;
        } catch (PDOException $e) {
            return substr($e->errorInfo[2], strpos($e->errorInfo[2], "DETAIL:") + 7);
        }
    }
}
