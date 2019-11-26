<?php

abstract class Model
{
    const db_name = "TABLENAME";
    protected $in_db = false;

    public static function all() {
        global $db;

        $classname = get_called_class();
        return array_map("{$classname}::instance", $db->all($classname::db_name));
    }

    abstract protected static function instance($r);

    public static function findAllByField($field, $value) {
        global $db;

        $classname = get_called_class();
        return array_map("{$classname}::instance", $db->findAllByField($classname::db_name, $field, $value));
    }

    abstract public function save();

    abstract public function getKeys();

    public function delete() {
        global $db;

        $db->delete($this::db_name, $this->getKeys());
    }

    public function show() {
        $fields = getFields($this);
        echo '<p>'.implode(', ', array_map(function ($v, $k) { return "$k: $v"; }, $fields, array_keys($fields))).'</p>';
    }
}
