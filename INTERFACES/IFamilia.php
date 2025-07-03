<?php 
    require_once '../ENTIDADES/Familia.php';
    interface IFamilia {
        public function guardar(Familia $familia);
        public function modificar(Familia $familia);
        public function borrar(Familia $familia);
        public function cargarPorId($idfam);
        public function cargar();
    }

?>