<?php 
class Categoria {
    private $idCategoria;
    private $nombre;
    private $idFamilia;

    public function getIdCategoria() { return $this->idCategoria; }
    public function setIdCategoria($idCategoria) { $this->idCategoria = $idCategoria; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getIdFamilia() { return $this->idFamilia; }
    public function setIdFamilia($idFamilia) { $this->idFamilia = $idFamilia; }
    
}

?>