<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';


class LocalPublico extends Model
{
    public $nome;
    public $latitude;
    public $longitude;

    const db_name = 'local_publico';

    protected static function instance($r) {
        return new self($r->nome, $r->latitude, $r->longitude, true);
    }

    public static function find($latitude, $longitude = NULL) {
        if($longitude == NULL)
            flashMessageAndRedirect('An error occurred', 'danger');
        $result = self::findAllByFields(['latitude' => $latitude, 'longitude' => $longitude]);
        return isset($result[0]) ? $result[0] : NULL; // only first
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
