<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!-- Agrega los enlaces a los archivos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">Lista de Productos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre_producto']; ?></td>
                        <td><?php echo $producto['referencia']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['peso']; ?></td>
                        <td><?php echo $producto['categoria']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['fecha_creacion']; ?></td>
                        <td>
                            <a href="controlador_productos.php?ver&id=<?php echo $producto['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="controlador_productos.php?editar&id=<?php echo $producto['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="controlador_productos.php?eliminar&id=<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="controlador_productos.php?crear" class="btn btn-success">Crear Nuevo Producto</a>
    </div>
    
    <!-- Agrega los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>