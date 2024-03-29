<?php

require_once __DIR__.'/../utils.php';
require_once __DIR__.'/../model.php';

class Anomalia extends Model
{
    public $id;
    public $zona;
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

    public static function findAllBetween($latitudes, $longitudes, $months = NULL) {
        global $db;

        rsort($latitudes);
        rsort($longitudes);
        $values = array_merge($latitudes, $longitudes);

        $sql = 'WITH TMP AS (SELECT * FROM item JOIN incidencia	ON item.id = incidencia.item_id	WHERE latitude <= ? AND latitude >= ? AND longitude <= ? AND longitude >= ?) SELECT anomalia.* FROM TMP JOIN anomalia ON anomalia.id = anomalia_id';

        if($months)
            $sql .= " WHERE ts > NOW() - INTERVAL '$months months'";

        return array_map('self::instance', $db->query($sql, $values));
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
