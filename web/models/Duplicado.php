<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

class Duplicado extends Model
{
    public $item1;
    public $item2;

    protected $in_db = false;
    const db_name = 'duplicado';

    protected static function instance($r) {
        return new self($r->item1, $r->item2, true);
    }

    public static function find($item1, $item2 = NULL) {
        if($item2 == NULL)
            flashMessageAndRedirect('An error occurred', 'danger');
        $result = self::findAllByFields(['item1' => $item1,'item2' => $item2]);
        return isset($result[0]) ? $result[0] : NULL; // only first
    }

    public function __construct($item1, $item2, $in_db = false) {
        $this->item1 = $item1;
        $this->item2 = $item2;

        $this->in_db = $in_db;
    }

    public function getKeys() {
        return [
            'item1' => $this->item1,
            'item2' => $this->item2
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
