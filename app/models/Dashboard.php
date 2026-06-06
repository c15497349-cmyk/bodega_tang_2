<?php

require_once __DIR__ . '/../core/Database.php';

class Dashboard {

    private PDO $conexion;

    public function __construct() {
        $this->conexion = Database::getConnection();
    }

    public function totalEmpleados() {
        return $this->conexion->query(
            "SELECT COUNT(*) AS total FROM empleado"
        )->fetch();
    }

    public function totalAsistencias() {
        return $this->conexion->query(
            "SELECT COUNT(*) AS total FROM asistencia"
        )->fetch();
    }

    public function totalAusentes() {
        return $this->conexion->query(
            "SELECT COUNT(*) AS total FROM asistencia WHERE estado='falto'"
        )->fetch();
    }

    public function totalTardanzas() {
        return $this->conexion->query(
            "SELECT COUNT(*) AS total FROM asistencia WHERE estado='tardanza'"
        )->fetch();
    }

    public function graficoResumen() {

        $sql = "SELECT estado, COUNT(*) total
                FROM asistencia
                GROUP BY estado";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}