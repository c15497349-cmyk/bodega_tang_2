<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Empleado.php';

// Controlador para el módulo de empleados.
class EmpleadosController extends Controller {
    // index() es el método por defecto cuando la URL no especifica acción.
    // Ejemplo: /empleados -> EmpleadosController::index()
    public function index(): void {
        // Reutilizamos la misma lógica que el reporte de empleados.
        $this->reporte();
    }

    // reportes() muestra el listado completo de empleados.
    // Ejemplo: /empleados/reportes
    public function reporte(): void {
        // Validación de sesión: si no hay usuario logueado, redirigimos al login.
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Cargamos el modelo y obtenemos los datos de empleados.
        $modelo = new Empleado();
        $variable_empleados = $modelo->obtenerEmpleados();

        // Enviamos los datos a la vista.
        $this->view('empleados/reportes', [
            'usuario' => $_SESSION['usuario'],
            'empleados' => $variable_empleados
        ]);
    }

    // reportes() es un alias de reporte() para mayor claridad en la URL.
    // Explicación para alumnos: el Router convierte la URL /empleados/reportes
    // en la llamada a EmpleadosController::reportes(). Al definir este alias
    // evitamos duplicar lógica y hacemos que la URL sea más legible.
    public function reportes(): void {
        // Reutilizamos la implementación de reporte() para mantener DRY.
        $this->reporte();
    }

    // registro() muestra el formulario para crear un nuevo empleado.
    // Ejemplo: /empleados/registro
    public function registro(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        $this->view('empleados/registro', [
            'usuario' => $_SESSION['usuario']
        ]);
    }

    // registrar() es otro alias para la misma vista de registro.
    public function registrar(): void {
        $this->registro();
    }

}
