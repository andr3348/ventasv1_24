<?php 
require_once '../LOGICA/LProducto.php';
$log = new LProducto();
$productos = $log->cargar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar productos</title>
</head>
<body>
    <a href="guardarproducto.php">Guardar</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Monto</th>
                <th>IDCategoria</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?=$producto['idproducto']?></td>
                    <td><?=$producto['nombre']?></td>
                    <td><?=$producto['stock']?></td>
                    <td><?=$producto['monto']?></td>
                    <td><?=$producto['idcategoria']?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>