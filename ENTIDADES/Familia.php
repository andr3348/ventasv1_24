<?php 
    class Familia {
        private $idFamilia;
        private $nombre;
        private $descripcion;

        public function getIdFamilia() { return $this->idFamilia; }
        public function setIdFamilia($idFamilia) { $this->idFamilia = $idFamilia; }

        public function getNombre() { return $this->nombre; }
        public function setNombre($nombre) { $this->nombre = $nombre; }

        public function getDescripcion() { return $this->descripcion; }
        public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    }

?>