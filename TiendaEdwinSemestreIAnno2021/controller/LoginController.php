<?php

require_once 'view/View.php';
require_once 'model/LoginModel.php';

class LoginController {

    public function __construct() {
        $this->view = new View();
        $this->model = new LoginModel();
    }

    public function show() {
        $this->view->show("LoginView.php", null);
    }

    public function iniciarSesion() {
        $data = $this->model->iniciarSesion();
        if ($data[0]['VAR'] != 'ERROR') {
            session_start();
            $_SESSION['TIPO'] = $data[0]['VAR'];
            $_SESSION['ID_USUARIO'] = $data[0]['ID_USUARIO'];
            header('Location: ' . 'index.php?controller=Home&action=show');
            die();
        }
    }

    public function showRegistrarse() {
        $this->view->show("SingInView.php", null);
    }

    public function registrarse() {
        $v = $this->model->registrarse();
        header('Location: ' . 'index.php?controller=Login&action=show');
        die();
    }

}
