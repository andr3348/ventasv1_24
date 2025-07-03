<?php
require_once '../INTERFACES/IFamilia.php';
require_once '../DATOS/DB.php';
class LFamilia implements IFamilia {
    function guardar(Familia $familia) {
        $db=new DB();
        $cn=$db->conectar();
        $sql = 'INSERT INTO familia (nombre,descripcion) VALUES (:nom,:des)';
        $ps = $cn->prepare($sql);
        $ps->execute([
            ':nom' => $familia->getNombre(),
            ':des' => $familia->getDescripcion()
        ]);
    }
    function borrar(Familia $familia){
        $db=new DB();
        $cn=$db->conectar();
        $sql = 'DELETE FROM familia WHERE idfamilia=:id';
        $ps = $cn->prepare($sql);
        $ps->execute([
            ':id' => $familia->getIdFamilia()
        ]);
    }
    function cargar(){
        $db=new DB();
        $cn=$db->conectar();
        $sql = 'SELECT * FROM familia';
        $ps = $cn->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();
        $familias = array();
        foreach ($filas as $f) {
            $fam = new Familia();
            $fam->setIdFamilia($f[0]);
            $fam->setNombre($f[1]);
            $fam->setDescripcion($f[2]);
            array_push($familias, $fam);
        }
        return $familias;
    }
    function cargarPorId($idfam) {
        $db=new DB();
        $cn=$db->conectar();
        $sql = 'SELECT * FROM familia WHERE idfamilia=:id';
        $ps = $cn->prepare($sql);
        $ps->execute([
            ':id' => $idfam
        ]);
        $familia = $ps->fetch(PDO::FETCH_ASSOC);
        return $familia;
    }
    
    function modificar(Familia $familia) {
        $db=new DB();
        $cn=$db->conectar();
        $sql = 'UPDATE familia SET nombre=:nom, descripcion=:des WHERE idfamilia=:id';
        $ps = $cn->prepare($sql);
        $ps->execute([
            ':nom' => $familia->getNombre(),
            ':des' => $familia->getDescripcion(),
            ':id' => $familia->getIdFamilia()
        ]);
    }
}

?>