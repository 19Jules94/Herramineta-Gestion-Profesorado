<?php
class Userss{

    public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

    public function __construct() {
        $this->userModel = $this->model('User');
    }


public function registrarUsuario() {

$data = [
            'dni' => '',
            'nombre' => '',
            'apellidos' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'borrado' => '',
            'dniError' => '',
            'nombreError' => '',
            'apellidosError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'borradoError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'dni' => trim($_POST['dni']),
                'nombre' => trim($_POST['nombre']),
                'apellidos' => trim($_POST['apellidos']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'borrado' => trim($_POST['borrado']),
                'dniError' => '',
                'nombreError' => '',
                'apellidosError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'borradoError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['dni'])) {
                $data['dniError'] = 'Please enter dni.';
            } elseif (!preg_match($nameValidation, $data['dni'])) {
                $data['dniError'] = 'Name can only contain letters and numbers.';
            }
            if(empty($data['nombre'])) {
                $data['nombreError'] = 'El nombre de una accion no puede ser vacio';
            }
            if(empty($data['apellidos'])) {
                $data['apellidosError'] = 'El nombre de una accion no puede ser vacio';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 6 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }
             if($data['borrado'] != 0  && $data['borrado'] != 1   ) {
                $data['borradoError'] = 'El borrado de una accion no puede ser distinto de 0 o 1';
            }


            // Make sure that errors are empty
            if (empty($data['dniError']) && empty($data['nombreError'])  && empty($data['apelldiosError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['borradoError'])) {

                // Hash password
            //    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }



    

    public function logearUsuario() {
 
 $data = [
            'dni' => '',
            'password' => '',
            'dniError' => '',
            'passwordError' => ''
        ];

         //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'dni' => trim($_POST['dni']),
                'password' => trim($_POST['password']),
                'dniError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['dni'])) {
                $data['dniError'] = 'Please enter a dni.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['dniError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['dni'], $data['password']);

                if ($loggedInUser) {
                    $this->crearSesionUsuario($loggedInUser);
                    return true;
                } else {
                    $data['passwordError'] = 'Password or dni is incorrect. Please try again.';

                    return false;
                }
            }

        } else {
            $data = [
                'dni' => '',
                'password' => '',
                'dniError' => '',
                'passwordError' => ''
            ];
        }
        return false;
    }
 
    public function crearSesionUsuario($user) {

        $_SESSION['dni'] = $user->dni;
        $_SESSION['email'] = $user->email;
        return true;
       // header('location:' . URLROOT . '/pages/index');

   
    }

    public function deshacerSesionUsuario() {
        unset($_SESSION['dni']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
   
    }
    }