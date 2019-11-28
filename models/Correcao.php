<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';


class Correcao extends Model
{
    public $email;
    public $nro;
    public $anomalia_id;

    const db_name = 'correcao';

    protected static function instance($r) {
        return new self($r->email, $r->nro, $r->anomalia_id, true);
    }

    public static function find($email, $nro = NULL, $anomalia_id = NULL) {
        if($nro == NULL || $anomalia_id == NULL)
            flashMessageAndRedirect('An error occurred', 'danger');
        $result = self::findAllByFields(['email' => $email, 'nro' => $nro, 'anomalia_id' => $anomalia_id]);
        return isset($result[0]) ? $result[0] : NULL; // only first
    }

    public function __construct($email, $nro, $anomalia_id, $in_db = false) {
        $this->email = $email;
        $this->nro = $nro;
        $this->anomalia_id = $anomalia_id;
        
        $this->in_db = $in_db;
    }

    public function getKeys() {
        return [
            'email' => $this->email,
            'nro' => $this->nro,
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
