<?php 
require_once '../LOGICA/LCategoria.php';
require_once '../LOGICA/LFamilia.php';
$catLog = new LCategoria();
$categorias = $catLog->cargar();

$famLog = new LFamilia();
$familias = $famLog->cargar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Guardar Producto</title>
</head>
<body>
    <div>
        <h1>Insercción de productos</h1>
        <hr> <br>
        <form action="" method="POST">
            <label for="nom">NOMBRE:</label><br>
            <input type="text" name="nom" id="nom"><br><br>

            <label for="stock">STOCK:</label><br>
            <input type="number" name="stock" id="stock" min="0"><br><br>

            <label for="monto">MONTO:</label><br>
            <input type="number" name="monto" id="monto" min="0"><br><br>

            <select name="fam" id="fam">
                <option value="">SLECCIONA UNA FAMILIA</option>
                <?php foreach($familias as $fam) { ?>
                    <option value="<?=$fam['idfamilia']?>"><?=$fam['nombre']?></option>
                <?php } ?>
            </select>

            <label for="cbxCat">CATEGORIA:</label><br>
            <select name="cbxCat" id="cbxCat"></select> <br><br>

            <button type="submit">GUARDAR</button>
        </form>
    </div>
</body>
</html>
<script>
    $('#fam').change(() => {
        n1 = $('#fam').val();
        param={'idfam':n1};
        $.ajax({
            url:'respuestacategorias1.php',
            data: param,
            type: 'get',
            success: (res) => {
                $('#cbxCat').html(res);
            }
        })
    })
</script>
<?php 
if ($_POST) {
    require_once '../ENTIDADES/Producto.php';
    require_once '../LOGICA/LProducto.php';

    $producto = new Producto();
    $producto->setNombre($_POST['nom']);
    $producto->setStock($_POST['stock']);
    $producto->setMonto($_POST['monto']);
    $producto->setIdCategoria($_POST['cbxCat']);

    $productoLog = new LProducto();
    $productoLog->guardar($producto);

    header('Location: cargarproducto.php');
    exit();
}
?>