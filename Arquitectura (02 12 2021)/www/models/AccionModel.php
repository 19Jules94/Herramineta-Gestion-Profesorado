<?php

class AccionModel
{
    private $id;
    private $nombre;
    private $descripcion;
    private $borrado;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
