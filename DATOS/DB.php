<?php
    class DB {
        private $url='pgsql: host=localhost; port=5432; dbname=ventasweb1';
        private $user='postgres';
        private $password='123';

        function conectar() {
            

            try {
                $cn = new PDO($this->url, $this->user, $this->password);
                return $cn;
            } catch (PDOException $e) {
                throw new Exception("Conexión a la BD fallida: ".$e->getMessage());
            }
        
        }
    }
    
?>