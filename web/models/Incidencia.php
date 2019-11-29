<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

class Incidencia extends Model
{
    public $anomalia_id;
    public $item_id;
    public $email;

    protected $in_db = false;
    const db_name = 'incidencia';

    protected static function instance($r) {
        return new self($r->anomalia_id, $r->item_id, $r->email, true);
    }

    public static function find($anomalia_id) {
        $result = self::findAllByFields(['anomalia_id' => $anomalia_id]);
        return isset($result[0]) ? $result[0] : NULL; // only first
    }

    public function __construct($anomalia_id, $item_id, $email, $in_db = false) {
        $this->anomalia_id = $anomalia_id;
        $this->item_id = $item_id;
        $this->email = $email;

        $this->in_db = $in_db;
    }

    public function getKeys() {
        return [
            'anomalia_id' => $this->anomalia_id
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
