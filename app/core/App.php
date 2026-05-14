<?php
class App {
    protected $controlador = 'Dashboard';
    protected $metodo = 'index';

    public function __construct() {
        $url = $this->getUrl();

        if(isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')){
            $this->controlador = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controlador . '.php';
        $this->controlador = new $this->controlador;

        if(isset($url[1]) && method_exists($this->controlador, $url[1])){
            $this->metodo = $url[1];
            unset($url[1]);
        }

        $params = $url ? array_values($url) : [];
        call_user_func_array([$this->controlador, $this->metodo], $params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}