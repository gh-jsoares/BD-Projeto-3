<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

require_once __DIR__.'/Correcao.php';


class PropostaDeCorrecao extends Model
{
    public $nro;
    public $email;
    public $data_hora;
    public $texto;

    const db_name = 'proposta_de_correcao';
    private $correcoes = [];

    protected static function instance($r) {
        return new self($r->email, $r->data_hora, $r->texto, $r->nro, true);
    }

    public static function find($email, $nro = NULL) {
        if($nro == NULL)
            flashMessageAndRedirect('An error occurred', 'danger');
        $result = self::findAllByFields(['email' => $email, 'nro' => $nro]);
        return isset($result[0]) ? $result[0] : NULL; // only first
    }

    public function __construct($email, $data_hora, $texto, $nro = NULL, $in_db = false) {
        $this->nro = $nro;
        $this->email = $email;
        $this->data_hora = $data_hora;
        $this->texto = $texto;
        
        $this->in_db = $in_db;
    }

    public function correcoes() {
        if(isset($this->correcoes))
            $this->correcoes = Correcao::findAllByFields($this->getKeys());
        return $this->correcoes;
    }

    public function getKeys() {
        return [
            'email' => $this->email,
            'nro' => $this->nro
        ];
    }

    public function save() {
        global $db;

        $fields = getFields($this);
        array_shift($fields); // remove nro

        try {
            if(!$this->in_db)
                $this->nro = $db->insert($this::db_name, $fields);
            else
                $db->update($this::db_name, $fields, $this->getKeys());

            return NULL;
        } catch (PDOException $e) {
            return substr($e->errorInfo[2], strpos($e->errorInfo[2], "DETAIL:") + 7);
        }
    }
}
