<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>INSERCCIÓN DE FAMILIAS</h1>
        <hr>
        <form action="" method="POST">
            <input type="text" name="txtNom" placeholder="Nombre">
            <input type="text" name="txtDes" placeholder="Descripción">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>

<?php 
    require_once '../LOGICA/LFamilia.php';
    if ($_POST) {
        $log = new LFamilia();
        $fam = new Familia();
        $fam->setNombre($_POST['txtNom']);
        $fam->setDescripcion($_POST['txtDes']);
        $log->guardar($fam);
        header('Location: cargarfamilias.php');
    }
?>