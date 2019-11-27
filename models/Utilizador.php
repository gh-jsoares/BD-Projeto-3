<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

require_once __DIR__.'/UtilizadorRegular.php';
require_once __DIR__.'/UtilizadorQualificado.php';


class Utilizador extends Model
{
    public $email;
    public $password;

    protected $in_db = false;
    const db_name = 'utilizador';

    private $tipo;

    protected static function instance($r) {
        return new self($r->email, $r->password, true);
    }

    public static function find($email) {
        $result = self::findAllByFields(['email' => $email]);
        return isset($result[0]) ? $result[0] : NULL; // only first
    }

    public function __construct($email, $password, $in_db = false) {
        $this->email = $email;
        $this->password = $password;
        
        $this->in_db = $in_db;
    }

    public function tipo() {
        if(!isset($this->tipo)) {
            $user = UtilizadorRegular::find($this->email);
            if($user)
                $this->tipo = 'Regular';
            else {
                $user = UtilizadorQualificado::find($this->email);
                if($user)
                    $this->tipo = 'Qualificado';
            }
        }

        return $this->tipo;
    }

    public function getKeys() {
        return [
            'email' => $this->email
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
