<?php 
require_once '../ENTIDADES/Producto.php';
interface IProducto {
    function guardar(Producto $producto);
    function cargar();
}
?>