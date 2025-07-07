<?php
require_once '../LOGICA/LCategoria.php';
$idfam = $_GET['idfam'];
$log = new LCategoria();
$categorias = $log->cargarPorFamilia($idfam);
$respuesta ='';
foreach($categorias as $cat) {
    $respuesta.='<option value="'.$cat['idcategoria'].'">'.$cat['nombre'].'</option>';
}
echo $respuesta;
?>