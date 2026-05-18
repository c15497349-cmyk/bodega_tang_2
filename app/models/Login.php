<?php
require_once __DIR__ . '/../core/Database.php';

class Login {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    public function login(string $nombreUsuario, string $clave): array|false {

        // ✅ CONSULTA CORRECTA
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";

        $stmt = $this->db->prepare($sql);

        // ✅ PARAMETRO CORRECTO
        $stmt->execute([
            'usuario' => $nombreUsuario
        ]);

        $usuario = $stmt->fetch();

        // ✅ VERIFICACIÓN CORRECTA (sin hash)
        if ($usuario && $clave === $usuario['password']) {
            return $usuario;
        }

        return false;
    }
}