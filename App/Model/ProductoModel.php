<?php
require_once '../App/Config/database.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $database = new DatabaseConnection();
        $this->db = $database->getConnection();
    }

    public function getAllProductos() {
        $query = "SELECT * FROM producto";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductoById($id) {
        $query = "SELECT * FROM producto WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertProducto($data) {
        $query = "INSERT INTO producto (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $stmt->bindParam(':precio', $data['precio']);
        
        if ($stmt->execute()) {
            return true; // Inserción exitosa
        } else {
            return false; // Fallo en la inserción
        }
    }

    public function updateProducto($id, $data) {
        $query = "UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $stmt->bindParam(':precio', $data['precio']);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true; // Actualización exitosa
        } else {
            return false; // Fallo en la actualización
        }
    }

    public function deleteProducto($id) {
        $query = "DELETE FROM producto WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true; // Eliminación exitosa
        } else {
            return false; // Fallo en la eliminación
        }
    }
}
?>