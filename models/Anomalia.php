<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

class Anomalia extends Model
{
    public $id;
    public $zona; // localpublico??
    public $imagem;
    public $lingua;
    public $ts;
    public $descricao;
    public $tem_anomalia_redacao;

    protected $in_db = false;
    const db_name = 'anomalia';

    protected static function instance($r) {
        return new self($r->zona, $r->imagem, $r->lingua, $r->ts, $r->descricao, $r->tem_anomalia_redacao, $r->id, true);
    }

    public function __construct($zona, $imagem, $lingua, $ts, $descricao, $tem_anomalia_redacao, $id = NULL, $in_db = false) {
        $this->id = $id;
        $this->zona = $zona;
        $this->imagem = $imagem;
        $this->lingua = $lingua;
        $this->ts = $ts;
        $this->descricao = $descricao;
        $this->tem_anomalia_redacao = $tem_anomalia_redacao;
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
                $this->id = $db->insert($this::db_name, $fields);
            else
                $db->update($this::db_name, $fields, $this->getKeys());
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
