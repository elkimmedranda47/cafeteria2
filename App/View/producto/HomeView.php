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
        <h1 class="mb-3">Crear Nuevo Producto</h1>
        <!-- Formulario para crear un nuevo producto -->
        <form action="controlador_productos.php" method="POST" class="mb-3">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="referencia">Referencia:</label>
                <input type="text" name="referencia" id="referencia" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" name="peso" id="peso" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria" id="categoria" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" class="form-control" required>
            </div>

            <button type="submit" name="crear_producto" class="btn btn-success">Crear Producto</button>
        </form>

        <h1 class="mb-3">Lista de Productos</h1>
        <!-- Lista de productos en una tabla más ancha -->
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
                <?php 
              

                foreach ($productos as $producto) { ?>
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
                            <a href="controlador_productos.php?editar&id=<?php echo $producto['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="controlador_productos.php?eliminar&id=<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h1 class="mb-3">Registrar Venta</h1>
        <!-- Formulario para registrar una venta -->
        <form action="controlador_ventas.php" method="POST" class="mb-3">
            <div class="form-group">
                <label for="id_producto">ID del Producto:</label>
                <input type="number" name="id_producto" id="id_producto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor Total:</label>
                <input type="number" name="valor" id="valor" class="form-control" required>
            </div>
            <button type="submit" name="registrar_venta" class="btn btn-success">Registrar Venta</button>
        </form>
    </div>
    
    <!-- Agrega los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
