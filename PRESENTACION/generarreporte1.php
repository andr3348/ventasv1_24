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
    <title>Document</title>
</head>
<body>
    <div>
        <h1>REPORTE CATEGORIA POR FAMILIA</h1>
        <hr>
        <select name="cbxFam" id="cbxFam" onchange="enviar()">
            <option value="">Seleccione una familia</option>
            <?php foreach ($familias as $fam) { ?>
                <option value="<?=$fam['idfamilia']?>"><?=$fam['nombre']?></option>
            <?php } ?>
        </select>
    </div>
</body>
</html>
<script>
    function enviar() {
        let idfam = document.getElementById('cbxFam').value;
        location.href='reporte1.php?idFam='+idfam;
    }
</script>