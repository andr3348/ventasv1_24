<?php
require_once '../DATOS/DB.php';
require_once '../INTERFACES/ICliente.php';
class LCliente implements ICliente {
    private $pdo;

    public function __construct() {
        $db = new DB();
        $this->pdo = $db->conectar();
    }

    public function getAll() {
        try {
            $sql = 'SELECT * FROM cliente';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }

    public function getById($id) {
        try {
            $sql = 'SELECT * FROM cliente WHERE idcliente=:id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }

    public function save(Cliente $cliente) {
        try {
            $sql = 'INSERT INTO cliente (nombres,apellidos,dni) 
                    VALUES (:nom, :ape, :dni)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $cliente->getNombres(),
                ':ape' => $cliente->getApellidos(),
                ':dni' => $cliente->getDni()
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }

    public function update(Cliente $cliente) {
        try {
            $sql = 'UPDATE cliente SET nombres=:nom, apellidos=:ape, dni=:dni WHERE idcliente=:id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $cliente->getNombres(),
                ':ape' => $cliente->getApellidos(),
                ':dni' => $cliente->getDni(),
                ':id' => $cliente->getIdCliente()
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }

    public function delete(Cliente $cliente) {
        try {
            $sql = 'DELETE FROM cliente WHERE idcliente=:id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $cliente->getIdCliente()
            ]);
        } catch (PDOException $e) {
            throw new Exception('Error: '. $e->getMessage());
        }
    }
}

?>