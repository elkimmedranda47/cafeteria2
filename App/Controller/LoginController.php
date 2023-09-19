<?php
require_once '../App/Model/LoginModel.php';
class LoginController {

    public static function index() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (LoginModel::authenticate($username, $password)) {
                echo "Inicio de sesión exitoso para el usuario: $username";
            } else {
                echo "Inicio de sesión fallido. Verifica tus credenciales.";
            }
        } else {
            include '../App/View/login_view.php';
          
        }


     

    }

    
    
}
?>