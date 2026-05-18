<?php 
require_once __DIR__ . '/../core/Database.php';

class Empleado {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    // Obtener todos los empleados
    public function obtenerEmpleados(): array {
        $sql = "SELECT * FROM empleados ORDER BY id_empleado DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}