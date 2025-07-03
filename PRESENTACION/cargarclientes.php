<?php 
require_once '../LOGICA/LCliente.php';
$log = new LCliente();
$clientes = $log->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Clientes</title>
</head>
<body>
    <div>
        <a href="guardarcliente.php">Nuevo Cliente</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente){ ?>
                    <tr>
                        <td><?= $cliente['idcliente']?></td>
                        <td><?= $cliente['nombres']?></td>
                        <td><?= $cliente['apellidos']?></td>
                        <td><?= $cliente['dni']?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>