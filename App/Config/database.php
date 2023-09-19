<?php

/*


try {
    $db_host = 'localhost'; // Cambia esto por el host de tu base de datos
    $db_name = 'cafeteria'; // Cambia esto por el nombre de tu base de datos
    $db_user = 'postgres'; // Cambia esto por tu nombre de usuario de PostgreSQL
    $db_password = 'password'; // Cambia esto por tu contraseña de PostgreSQL

    $conn = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    define("conexion",  $conn);

} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
*/


class DatabaseConnection {
    private $conn;

    public function __construct() {
        try {

            $db_host = 'localhost'; // Cambia esto por el host de tu base de datos
            $db_name = 'cafeteria'; // Cambia esto por el nombre de tu base de datos
            $db_user = 'postgres'; // Cambia esto por tu nombre de usuario de PostgreSQL
            $db_password = 'password'; // Cambia esto por tu contraseña de PostgreSQL
            $this->conn = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}








?>


