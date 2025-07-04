<?php 
require_once '../LOGICA/LCategoria.php';
$log = new LCategoria();
$categorias = $log->cargarPorFamilia($_GET['idFam']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar categorias</title>
</head>
<body>
    <div>
        <h1>CATEGORIAS DE LA FAMILIA <?=$_GET['idFam']?></h1>
        <hr>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Id familia</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categorias as $categoria) { ?>
                    <tr>
                        <td><?= $categoria['idcategoria']?></td>
                        <td><?= $categoria['nombre']?></td>
                        <td><?= $categoria['idfamilia']?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>