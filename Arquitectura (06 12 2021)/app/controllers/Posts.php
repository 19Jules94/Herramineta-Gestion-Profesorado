<?php
class Posts extends Controller {
    public function __construct() {
        $this->accionModel = $this->model('Post');
    }

    public function index() {
        $accion = $this->accionModel->findAllActions();

        $data = [
            'accion' => $accion
        ];

        $this->view('posts/index', $data);
    }

    public function create() {
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
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

            if(empty($data['borrado'])) {
                $data['borradoError'] = 'El borrado de una accion no puede ser vacio';
            }


            if (empty($data['idError']) && empty($data['nombreError']) && empty($data['descripcionError']) && empty($data['borradoError'])) {
                if ($this->accionModel->addAccion($data)) {
                    header("Location: " . URLROOT . "/posts");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('posts/create', $data);
            }
        }

        $this->view('posts/create', $data);
    }

    public function update($id) {

        $accion = $this->accionModel->findAccionById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } //elseif($post->user_id != $_SESSION['user_id']){
            //header("Location: " . URLROOT . "/posts");
        //}

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
                'id' => $id,
                'accion' => $accion,
                'nombre' => trim($_POST['nombre']),
                'descripcion' => trim($_POST['descripcion']),
                'borrado' => trim($_POST['borrado']),
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
            if(empty($data['borrado'])) {
                $data['borradoError'] = 'El borrado de una accion no puede ser vacio';
            }

            if($data['nombre'] == $this->accionModel->findAccionById($id)->nombre) {
                $data['nombreError'] == 'Pero cambiale el nombre';
            }

            if($data['descripcion'] == $this->accionModel->findAccionById($id)->descripcion) {
                $data['descripcionError'] == 'Pero cambiale la descripcion';
            }


            if (empty($data['nombreError']) && empty($data['descripcionError']) && empty($data['borradoError']) ) {
                if ($this->accionModel->updateAccion($data)) {
                    header("Location: " . URLROOT . "/posts");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('posts/update', $data);
            }
        }

        $this->view('posts/update', $data);
    }

    public function delete($id) {

        $accion = $this->accionModel->findAccionById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } //elseif($post->user_id != $_SESSION['user_id']){
           // header("Location: " . URLROOT . "/posts");
       // }

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
                    header("Location: " . URLROOT . "/posts");
            } else {
               die('Something went wrong!');
            }
        }
    }
}

