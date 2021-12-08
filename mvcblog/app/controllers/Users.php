<?php
class Users extends Controller {
    public function __construct() {
        $this->userServicio = $this->service('Userss');
    }

    public function register() {

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

      if ($this->userServicio->registrarUsuario()){
            header('location: ' . URLROOT . '/users/login');
            }else {
                $this->view('users/register', $data);
                }
    }

    public function login() {
        $data = [
            'dni' => '',
            'password' => '',
            'dniError' => '',
            'passwordError' => ''
        ];

        if ($this->userServicio->logearUsuario()){
            header('location:' . URLROOT . '/pages/index');
            }else {
                $this->view('users/login', $data);
                }

     /*   //Check for post
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
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or dni is incorrect. Please try again.';

                    $this->view('users/login', $data);
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
        $this->view('users/login', $data);
          */ 
    }

   // public function createUserSession($user) {
 //       $_SESSION['dni'] = $user->dni;
 //       $_SESSION['email'] = $user->email;
 //       header('location:' . URLROOT . '/pages/index');
 //   }

    public function logout() {

        $this->userServicio->deshacerSesionUsuario();
   //      unset($_SESSION['dni']);
  //       unset($_SESSION['email']);
   //      header('location:' . URLROOT . '/users/login');
    }
}
