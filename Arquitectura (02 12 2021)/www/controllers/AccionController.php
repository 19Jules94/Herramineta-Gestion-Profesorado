<?php
require_once 'models/AccionModel.php';

class AccionController{

    private $service;

    public function __CONSTRUCT(){
        $this->service = new Accion();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'views/Accion.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $alm = new Accion();

        if(isset($_REQUEST['id'])){
            $alm = $this->service->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/AccionEditar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $alm = new Accion();

        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['nombre'];
        $alm->Apellido = $_REQUEST['descripcion'];
        $alm->Correo = $_REQUEST['borrado'];

        $alm->id > 0 
            ? $this->service->Actualizar($alm)
            : $this->service->Registrar($alm);

        header('Location: index.php');
    }

    public function Eliminar(){
        $this->service->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}

?>