<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO usuario (dni, nombre, apellidos, email, password, borrado) VALUES(:dni, :nombre, :apellidos, :email, :password, :borrado)');

        //Bind values
        $this->db->bind(':dni', $data['dni']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':apellidos', $data['apellidos']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':borrado', $data['borrado']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($dni, $password) {
        $this->db->query('SELECT * FROM usuario WHERE dni = :dni');

        //Bind value
        $this->db->bind(':dni', $dni);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM usuario WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
