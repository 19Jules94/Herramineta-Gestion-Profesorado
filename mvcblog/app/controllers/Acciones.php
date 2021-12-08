<?php
class Acciones extends Controller {
    public function __construct() {
        $this->accionServicio = $this->service('Accions');
    }

    public function index() {
        $data = $this->accionServicio->listarAcciones();

       // $data = [
    //        'accion' => $accion
    //    ];

        $this->view('acciones/index', $data);
    }

    public function create() {
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/acciones");
        }
        $data = [
            'id' => '',
            'nombre' => '',
            'descripcion' => '',
            'borrado' => '',
            'idError' => '',
            'nombreError' => '',
            'descripcionError' => '',
            'borradoError' => ''
        ];
        if ($this->accionServicio->crearAcciones()){
            header("Location: " . URLROOT . "/acciones");
            }else {
                $this->view('acciones/create', $data);
                }
 /*
        $data = [
            'id' => '',
            'nombre' => '',
            'descripcion' => '',
            'borrado' => '',
            'idError' => '',
            'nombreError' => '',
            'descripcionError' => '',
            'borradoError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                //'user_id' => $_SESSION['user_id'],
                'id' => trim($_POST['id']),
                'nombre' => trim($_POST['nombre']),
                'descripcion' => trim($_POST['descripcion']),
                'borrado' => trim($_POST['borrado']),
                'idError' => '',
                'nombreError' => '',
                'descripcionError' => '',
                'borradoError' => ''
            ];

            if(empty($data['id'])) {
                $data['idError'] = 'El id de una accion no puede ser vacio';
            }

            if(empty($data['nombre'])) {
                $data['nombreError'] = 'El nombre de una accion no puede ser vacio';
            }
            if(empty($data['descripcion'])) {
                $data['descripcionError'] = 'La descripcion de una accion no puede ser vacio';
            }

            if($data['borrado' ] != 0 && $data['borrado'] != 1   ) {
                $data['borradoError'] = 'El borrado de una accion no puede ser distinto de 0 o 1';
            }


            if (empty($data['idError']) && empty($data['nombreError']) && empty($data['descripcionError']) && empty($data['borradoError'])) {
                if ($this->accionModel->addAccion($data)) {
                    header("Location: " . URLROOT . "/acciones");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('acciones/create', $data);
            }
        }

        $this->view('acciones/create', $data);
  */ 
   
 }

    public function update($id) {

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/acciones");
}
        $data = [
            'accion' => '',
            'id' => '',
            'nombre' => '',
            'descripcion' => '',
            'borrado' => '',
            'idError' => '',
            'nombreError' => '',
            'descripcionError' => '',
            'borradoError' => ''
        ];    
        if ($this->accionServicio->actualizarAcciones($id)){
            header("Location: " . URLROOT . "/acciones");
            }else {
                $this->view('acciones/update', $data);
                }

/*

        $accion = $this->accionModel->findAccionById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/acciones");
        } //elseif($post->user_id != $_SESSION['user_id']){
            //header("Location: " . URLROOT . "/posts");
        //}

        $data = [
            'accion' => $accion,
            'id' => '',
            'nombre' => '',
            'descripcion' => '',
            'borrado' => '',
            'idError' => '',
            'nombreError' => '',
            'descripcionError' => '',
            'borradoError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'accion' => $accion,
                'nombre' => trim($_POST['nombre']),
                'descripcion' => trim($_POST['descripcion']),
                'borrado' => trim($_POST['borrado']),
                'idError' => '',
                'nombreError' => '',
                'descripcionError' => '',
                'borradoError' => ''
            ];

            if(empty($data['nombre'])) {
                $data['nombreError'] = 'El nombre de una accion no puede ser vacio';
            }

            if(empty($data['descripcion'])) {
                $data['descripcionError'] = 'La descripcion de una accion no puede ser vacio';
            }
           if($data['borrado'] != 0  && $data['borrado'] != 1   ) {
                $data['borradoError'] = 'El borrado de una accion no puede ser distinto de 0 o 1';
            }

            if($data['nombre'] == $this->accionModel->findAccionById($id)->nombre) {
                $data['nombreError'] == 'Pero cambiale el nombre';
            }

            if($data['descripcion'] == $this->accionModel->findAccionById($id)->descripcion) {
                $data['descripcionError'] == 'Pero cambiale la descripcion';
            }


            if (empty($data['nombreError']) && empty($data['descripcionError']) && empty($data['borradoError']) ) {
                if ($this->accionModel->updateAccion($data)) {
                    header("Location: " . URLROOT . "/acciones");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('acciones/update', $data);
            }
        }

        $this->view('acciones/update', $data);
        */
    }

    public function delete($id) {

       
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/acciones");
}
            if ($this->accionServicio->eliminarAcciones($id)){
            header("Location: " . URLROOT . "/acciones");
            } else {
                die('Something went wrong!');
                }
         //elseif($post->user_id != $_SESSION['user_id']){
           // header("Location: " . URLROOT . "/posts");
       // }
/*
        $data = [
            'accion' => $accion,
            'id' => '',
            'nombre' => '',
            'descripcion' => '',
            'borrado' => '',
            'idError' => '',
            'nombreError' => '',
            'descripcionError' => '',
            'borradoError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->accionModel->deleteAccion($id)) {
                    header("Location: " . URLROOT . "/acciones");
            } else {
               die('Something went wrong!');
            }
        }
        */
    }
}

