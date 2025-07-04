<?php 
require_once '../LOGICA/LCategoria.php';
require_once '../LOGICA/LFamilia.php';
$log = new LFamilia();
$familias = $log->cargar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guarda categoria</title>
</head>
<body>
    <div>
        <h1>Modulo de insercción</h1>
        <hr>
        <form action="" method="POST">
            <label for="txtNom">Nombre:</label>
            <input type="text" name="txtNom" id="txtNom">
            <select name="cbxFam" id="cbxFam">
                <option value="">Seleccione una familia</option>
                <?php foreach ($familias as $fam) { ?>
                    <option value="<?=$fam['idfamilia']?>"><?=$fam['nombre']?></option>
                <?php } ?>
            </select> <br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
<?php 
if ($_POST) {
    require_once '../LOGICA/LCategoria.php';
    require_once '../ENTIDADES/Categoria.php';

    $logCat = new LCategoria();

    $categoria = new Categoria();
    $categoria->setNombre($_POST['txtNom']);
    $categoria->setIdFamilia($_POST['cbxFam']);

    $logCat->guardar($categoria);
    header('Location: cargarcategorias.php');
}

?>