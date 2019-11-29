<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

class Item extends Model
{
    public $id;
    public $descricao;
    public $localizacao;
    public $latitude;
    public $longitude;

    const db_name = 'item';

    protected static function instance($r) {
        return new self($r->descricao, $r->localizacao, $r->latitude, $r->longitude, $r->id, true);
    }
    
    public function __construct($descricao, $localizacao, $latitude, $longitude, $id = NULL, $in_db = false) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->localizacao = $localizacao;
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $this->in_db = $in_db;
    }

    public function getKeys() {
        return [
            'id' => $this->id
        ];
    }

    public function save() {
        global $db;

        $fields = getFields($this);
        array_shift($fields); // remove id

        try {
            if(!$this->in_db)
                $this->id = $db->insert($this::db_name, $fields);
            else
                $db->update($this::db_name, $fields, $this->getKeys());

            return NULL;
        } catch (PDOException $e) {
            return substr($e->errorInfo[2], strpos($e->errorInfo[2], "DETAIL:") + 7);
        }
    }
}
