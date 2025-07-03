<?php 

interface ICliente {
    public function getAll();
    public function getById($id);
    public function save(Cliente $cliente);
    public function update(Cliente $cliente);
    public function delete(Cliente $cliente);
}

?>