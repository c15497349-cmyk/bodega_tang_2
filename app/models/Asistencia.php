<?php
class Asistencia {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAsistencias() {
        $this->db->query("
            SELECT 
            a.id_asistencia,
            e.nombre,
            e.apellido,
            e.dni,
            c.nombre_cargo,
            a.fecha,
            a.hora_entrada,
            a.hora_salida,
            a.estado
            FROM asistencia a
            JOIN empleado e ON a.id_empleado = e.id_empleado
            JOIN cargo c ON e.id_cargo = c.id_cargo
        ");

        return $this->db->resultSet();
    }
}