<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Cliente</title>
</head>
<body>
    <div>
        <h1>INSERCCIÓN DE CLIENTES</h1>
        <hr>
        <form action="" method="POST">
            <input type="text" name="txtNom" placeholder="Nombres">
            <input type="text" name="txtApe" placeholder="Apellidos">
            <input type="text" name="txtDni" placeholder="Dni">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php 
if ($_POST) {
    require_once '../LOGICA/LCliente.php';
    require_once '../ENTIDADES/Cliente.php';
    $log = new LCliente();

    $cliente = new Cliente();
    $cliente->setNombres($_POST['txtNom']);
    $cliente->setApellidos($_POST['txtApe']);
    $cliente->setDni($_POST['txtDni']);

    $log->save($cliente);
    header('Location: cargarclientes.php');
}
?>