<?php
require_once __DIR__ . '/../core/Database.php';
date_default_timezone_set('America/Lima');

class Asistencia
{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }
    //Creamos una funcion para registrar junto con su parametro de (int $id_empleado)
       public function registrar(int $id_empleado): bool{

    $consulta = $this->db->prepare(
        "SELECT id_asistencia
        FROM asistencia
        WHERE id_empleado = ?
        AND fecha = CURDATE()"
    );

    $consulta->execute([$id_empleado]);

    if($consulta->fetch()){
        return false;
    }

    $horaActual = date('H:i:s');

    if($horaActual > '08:00:00'){
        $estado = 'tardanza';
    }else{
        $estado = 'asistio';
    }

    $sql = "INSERT INTO asistencia(
                fecha,
                hora_entrada,
                hora_salida,
                estado,
                id_empleado
            )
            VALUES(
                CURDATE(),
                NOW(),
                NULL,
                ?,
                ?
            )";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([$estado,$id_empleado]);
}
}
