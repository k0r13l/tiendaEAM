<?php

require_once 'public/ApiConnect.php';
require_once 'lib/Config.php';

class LoginModel {

    public function __construct() {
        $this->connect = new ApiConnect();
    }

    public function iniciarSesion() {
        $config = Config::getInstance();
        return json_decode($this->connect->GET($config->get('apiURL') . '?ACTION=INICIAR_SESION' . '&USER=' . $_POST['usuario'] . '&PASS=' . $_POST['pass']), true);
    }

    public function registrarse() {
        $config = Config::getInstance();
        $data['usuario'] = $_POST['usuario'];
        $data['pass'] = $_POST['pass'];
        $data['genero'] = $_POST['genero'];
        $data['f_nac'] = $_POST['f_nac'];
        $data['direccion'] = $_POST['direccion'];
        return json_decode($this->connect->POST($config->get('apiURL'), $data), true);
    }

}
