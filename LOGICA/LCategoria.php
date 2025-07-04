<?php 
require_once '../DATOS/DB.php';
require_once '../ENTIDADES/Categoria.php';
require_once '../INTERFACES/ICategoria.php';
class LCategoria implements ICategoria {
    private $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->conectar();
    }

    public function guardar(Categoria $categoria) {
        try {
            $sql = 'INSERT INTO categoria (nombre, idfamilia)
                    VALUES (:nom,:idfam)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $categoria->getNombre(),
                ':idfam' => $categoria->getIdFamilia(),
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error: ".$e->getMessage());
        }
    }
    public function cargar() {
        try {
            $sql = 'SELECT *  FROM categoria';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;
        } catch (PDOException $e) {
            throw new Exception("Error: ".$e->getMessage());
        }
    }

    public function cargarPorFamilia($idFam) {
        try {
            $sql = 'SELECT *  FROM categoria WHERE idfamilia = :idfam';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':idfam' => $idFam]);
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;
        } catch (PDOException $e) {
            throw new Exception("Error: ".$e->getMessage());
        }
    }
}

?>