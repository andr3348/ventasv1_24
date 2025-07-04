<?php 
require_once '../ENTIDADES/Categoria.php';
interface ICategoria {
    public function guardar(Categoria $categoria);
    public function cargar();
    public function cargarPorFamilia($idFam);
}

?>