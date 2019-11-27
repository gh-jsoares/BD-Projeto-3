<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

class AnomaliaTraducao extends Model
{
    public $id;
    public $zona2;
    public $lingua2;

    protected $in_db = false;
    const db_name = 'anomalia_traducao';

    protected static function instance($r) {
        return new self($r->zona2, $r->lingua2, $r->id, true);
    }

    public function __construct($zona2, $lingua2, $id = NULL, $in_db = false) {
        $this->id = $id;
        $this->zona2 = $zona2;
        $this->lingua2 = $lingua2;
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

        try {
            if(!$this->in_db)
                $db->insert($this::db_name, $fields, false);
            else
                $db->update($this::db_name, $fields, $this->getKeys());
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
