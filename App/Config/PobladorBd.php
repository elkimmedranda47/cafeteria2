<?php


require_once 'database.php';
try {

    // Uso de la clase para establecer una conexión
/*$db_host = 'localhost'; // Cambia esto por el host de tu base de datos
$db_name = 'cafeteria'; // Cambia esto por el nombre de tu base de datos
$db_user = 'postgres'; // Cambia esto por tu nombre de usuario de PostgreSQL
$db_password = 'password'; // Cambia esto por tu contraseña de PostgreSQL

$database = new DatabaseConnection($db_host, $db_name, $db_user, $db_password);
$conn = $database->getConnection();*/

// Ahora puedes usar $conn para realizar consultas a la base de datos

// Cuando hayas terminado, puedes cerrar la conexión
// $database->closeConnection();

    $database = new DatabaseConnection( );
    $conn = $database->getConnection();

    $conn->beginTransaction();

    $producto_mayor_stock="SELECT *
    FROM producto p
    LEFT JOIN venta v ON p.id = v.id_producto
    ORDER BY p.stock DESC
    LIMIT 1";
    
    // Consulta SQL para eliminar la tabla 'producto' si existe
     $sql_drop_productos = "DROP TABLE IF EXISTS producto;";
    
     // Consulta SQL para eliminar la tabla 'venta' si existe
     $sql_drop_venta = "DROP TABLE IF EXISTS venta;";

    // Consulta SQL para crear la tabla 'productos'
    $sql_create_productos = "CREATE TABLE IF NOT EXISTS producto (
        id SERIAL PRIMARY KEY,
        nombre_producto TEXT NOT NULL,
        referencia TEXT NOT NULL,
        precio INT NOT NULL,
        peso INT NOT NULL,
        categoria TEXT NOT NULL,
        stock INT NOT NULL,
        fecha_creacion DATE NOT NULL
    );";

    // Consulta SQL para crear la tabla 'venta'
    $sql_create_venta = "CREATE TABLE IF NOT EXISTS venta (
        id_venta SERIAL PRIMARY KEY,
        id_producto INT,
        cantidad_venta INT,
        total_venta DECIMAL(10, 2),
        FOREIGN KEY (id_producto) REFERENCES producto(id)
    );";

    // Consulta SQL para insertar productos de prueba
    $sql_insert_productos = "INSERT INTO producto (nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion)
        VALUES
        ('Producto 1', 'REF001', 50, 1, 'Electrónica', 100, '2023-10-18'),
        ('Producto 2', 'REF002', 30, 2, 'Ropa', 50, '2023-09-18'),
        ('Producto 3', 'REF003', 20, 0.5, 'Juguetes', 200, '2023-09-18'),
        ('Producto 4', 'REF004', 75, 1.5, 'Electrodomésticos', 75, '2023-09-18'),
        ('Producto 5', 'REF005', 10, 0.2, 'Alimentos', 300, '2023-09-18');";

    // Consulta SQL para insertar ventas de prueba
    $sql_insert_venta = "INSERT INTO venta (id_producto, cantidad_venta, total_venta)
        VALUES
        (1, 5, 250.00),
        (2, 2, 60.00),
        (3, 10, 200.00),
        (4, 3, 225.00),
        (5, 8, 80.00);";




    // Ejecutar las consultas SQL
  //  $conn->exec($sql_drop_venta);
   // $conn->exec( $sql_drop_productos);

   /* $conn->exec($sql_create_productos);
    $conn->exec($sql_create_venta);
    $conn->exec($sql_insert_productos);
    $conn->exec($sql_insert_venta);

    // Validar si todas las consultas se ejecutaron con éxito antes de hacer el commit
    if ($conn->commit()) {
        echo "Tabla 'venta' creada con éxito.<br>";
        echo "Productos de prueba insertados con éxito.<br>";
        echo "Ventas de prueba insertadas con éxito.<br>";
    } else {
        // Si no se pudo hacer el commit, realizar un rollback
        $conn->rollback();
        echo "Error al realizar el commit.<br>";
    }
*/

/*
$sql_check_productos = "SELECT EXISTS (SELECT 1  FROM producto where id=1);";

// Consulta SQL para verificar si la tabla 'venta' existe
$sql_check_venta = "SELECT EXISTS (SELECT 1from venta where id_venta=1);";

// Ejecutar las consultas de verificación
$producto_exists = $conn->query($sql_check_productos)->fetchColumn();
$venta_exists = $conn->query($sql_check_venta)->fetchColumn();

if (!$producto_exists) {
    // La tabla 'producto' no existe, entonces la creamos
    $conn->exec($sql_create_productos);
    echo "Tabla 'producto' creada con éxito.<br>";
} else {
    echo "La tabla 'producto' ya existe, no se creará de nuevo.<br>";
}

if (!$venta_exists) {
    // La tabla 'venta' no existe, entonces la creamos
    $conn->exec($sql_create_venta);
    echo "Tabla 'venta' creada con éxito.<br>";
} else {
    echo "La tabla 'venta' ya existe, no se creará de nuevo.<br>";
}

// Validar si todas las consultas se ejecutaron con éxito antes de hacer el commit
if ($conn->commit()) {
    echo "Productos de prueba insertados con éxito.<br>";
    echo "Ventas de prueba insertadas con éxito.<br>";
} else {
    // Si no se pudo hacer el commit, realizar un rollback
    $conn->rollback();
    echo "Error al realizar el commit.<br>";
}
*/

 // Consulta SQL para verificar si la tabla 'producto' existe
 $sql_check_productos = "SELECT EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'producto');";

 // Consulta SQL para verificar si la tabla 'venta' existe
 $sql_check_venta = "SELECT EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'venta');";

 // Ejecutar las consultas de verificación
 $producto_exists = $conn->query($sql_check_productos)->fetchColumn();
 $venta_exists = $conn->query($sql_check_venta)->fetchColumn();

 if (!$producto_exists && !$venta_exists) {
     // Si ninguna de las tablas existe, entonces creamos ambas tablas y agregamos registros
     $conn->exec($sql_create_productos);
     $conn->exec($sql_create_venta);
     $conn->exec($sql_insert_productos);
     $conn->exec($sql_insert_venta);
     
     echo "Tablas 'producto' y 'venta' creadas y registros insertados con éxito.<br>";
 } else {
     // Si al menos una de las tablas existe, no insertamos registros
     echo "Las tablas ya existen, no se insertarán registros.<br>";
 }

 // Validar si todas las consultas se ejecutaron con éxito antes de hacer el commit
 if ($conn->commit()) {
     echo "Commit realizado con éxito.<br>";
 } else {
     // Si no se pudo hacer el commit, realizar un rollback
     $conn->rollback();
     echo "Error al realizar el commit.<br>";
 }



} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

?>