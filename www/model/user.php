<?php

include_once '../scripts/db.php';


class UserModel extends DB{

    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $pass;


    function __construct($dni,$nombre,$apellidos,$email,$pass)
    {
        parent::__construct();
        $this->$dni=$dni;
        $this->$nombre=$nombre;
        $this->$apellidos=$apellidos;
        $this->$email=$email;
        $this->$pass=$pass;
    }

    public function exists(){

        if(!$this->db){return false; }
        
        $exists= false;

        if($stmt = $this->db->prepare("SELECT dni FROM usuario WHERE nombre=? OR email=? LIMIT=1")){
           $stmt->bind_param('ss',$this->nombre,$this->email); 
           $stmt->execute();
           $result = $stmt->get_result();
           $stmt->close();
           $exists=$result->num_rows==1;
        }
        return $exists;
    }

    public function login(){
        $login = false;
        if(!$this->db){return $login; }

        if($stmt = $this->db->prepare("SELECT dni,nombre FROM usuario WHERE email=? AND password=? LIMIT=1")){
            $pass = hash("sha256",$this->pass);
            $stmt->bind_param('ss',$this->email,$this->$pass); 
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $login=$result->num_rows==1;

         }
         return $login;
    }
}