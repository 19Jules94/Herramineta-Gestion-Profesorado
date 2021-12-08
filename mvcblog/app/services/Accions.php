<?php
class Accions{

    public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

    public function __construct() {
        $this->accionModel = $this->model('Accion');
    }

    public function listarAcciones() {
        $accion = $this->accionModel->findAllActions();

        $data = [
            'accion' => $accion
        ];

        return $data;
    }
    }