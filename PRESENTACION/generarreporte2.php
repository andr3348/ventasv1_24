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
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>generar reporte 2</title>
</head>
<body>
    <div>
        <h1>REPORTE CATEGORIA POR FAMILIA</h1>
        <hr>
        <select name="cbxFam" id="cbxFam">
            <option value="">Seleccione una familia</option>
            <?php foreach ($familias as $fam) { ?>
                <option value="<?=$fam['idfamilia']?>"><?=$fam['nombre']?></option>
            <?php } ?>
        </select>
    </div>
    <div id="res"></div>
</body>
</html>
<script>
    $('#cbxFam').change(() => {
        idFam = $('#cbxFam').val();
        param={'idFam':idFam};
        $.ajax({
            url:'reporte1.php',
            data: param,
            type: 'get',
            success: (res) => {
                $('#res').html(res);
            }
        })
    })
</script>