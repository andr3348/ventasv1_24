<?php 
require_once '../INTERFACES/IProducto.php';
require_once '../ENTIDADES/Producto.php';
require_once '../DATOS/DB.php';
class LProducto implements IProducto {
    private $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->conectar();
    }

    function guardar(Producto $producto) {
        try {
            $sql = 'INSERT INTO producto (nombre,stock,monto,idcategoria)
                    VALUES (:nom,:stock,:mon,:idcat)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $producto->getNombre(),
                ':stock' => $producto->getStock(),
                ':mon' => $producto->getMonto(),
                ':idcat' => $producto->getIdCategoria(),
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }
    function cargar() {
        try {
            $sql = 'SELECT * FROM producto';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }
}

?>