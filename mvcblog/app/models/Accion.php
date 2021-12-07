<?php
class Accion {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllActions() {
        $this->db->query('SELECT * FROM accion ORDER BY id ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addAccion($data) {
        $this->db->query('INSERT INTO accion (id, nombre, descripcion, borrado) VALUES (:id, :nombre, :descripcion, :borrado)');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':borrado', $data['borrado']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findAccionById($id) {
        $this->db->query('SELECT * FROM accion WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateAccion($data) {
        $this->db->query('UPDATE accion SET id = :id, nombre = :nombre, descripcion = :descripcion, borrado = :borrado WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':descripcion', $data['descripcion']);
        $this->db->bind(':borrado', $data['borrado']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAccion($id) {
        $this->db->query('DELETE FROM accion WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
