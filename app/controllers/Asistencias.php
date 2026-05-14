<?php
class Asistencias extends Controller {

    public function __construct() {
        $this->modelo = $this->model('Asistencia');
    }

    public function index() {
        $data = [
            'asistencias' => $this->modelo->getAsistencias()
        ];
        $this->view('asistencias/index', $data);
    }
}