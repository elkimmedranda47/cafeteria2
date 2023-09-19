<?php
class LoginModel {
    public static function authenticate($username, $password) {
        // En una aplicación real, verificaría en una base de datos.
        $users = [
            'elkin@gmail.com' => '1234',
            'usuario1' => 'contraseña1',
            'usuario2' => 'contraseña2'
        ];

        if (isset($users[$username]) && $users[$username] === $password) {
            return true;
        }

        return false;
    }
}
?>