<?php
//require_once '../Config/database.php'; // Asegúrate de incluir el archivo de conexión a la base de datos


// Incluye el modelo de Producto
//require_once 'ProductoModel.php';
require_once '../App/Model/ProductoModel.php';

class ProductoController {
    private $modelo;
    
    public function __construct() {
        
        $this->modelo = new ProductoModel();
    }

    // Métodos para las rutas y acciones
    public function listarProductos() {
        $productos = $this->modelo->getAllProductos();
        //include '../../App/View/producto/ListarProducto.php';// Incluye la vista para mostrar la lista de productos
        include __DIR__ . '/../../App/View/producto/ListarProducto.php';

    }

    public function verProducto($id) {
        $producto = $this->modelo->obtenerProductoPorID($id);
        include 'vista_ver_producto.php'; // Incluye la vista para mostrar un producto
    }

    // Otros métodos para crear, editar y eliminar productos

}

// Crear una instancia de la conexión PDO
/*$conexion = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
/*$database = new DatabaseConnection( );
$conn = $database->getConnection();*/


// Crear una instancia del controlador
$controlador = new ProductoController();

// Lógica para determinar qué acción se debe realizar según la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['listar'])) {
    $controlador->listarProductos();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ver']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $controlador->verProducto($id);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_producto'])) {
    // Lógica para crear un nuevo producto
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['editar']) && isset($_GET['id'])) {
    // Lógica para editar un producto
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_producto'])) {
    // Lógica para actualizar un producto
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['eliminar']) && isset($_GET['id'])) {
    // Lógica para eliminar un producto
}
?>