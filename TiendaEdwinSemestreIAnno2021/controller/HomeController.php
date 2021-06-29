<?php

require_once 'view/View.php';
require_once 'model/HomeModel.php';
require_once 'model/ProductModel.php';

class HomeController {

    public function __construct() {
        $this->view = new View();
        $this->model = new HomeModel();
        $this->prodModel = new ProductModel();
    }

    public function Lista_carrito() {
        session_start();
        echo $this->model->ListarCarritoModel();
    }

    public function getSesion() {
        session_start();
        echo $_SESSION['ID_USUARIO'];
    }

    public function showAdminPanel() {
        $data = $this->model->listarCategorias();
        $this->view->show("AdminPanel.php", $data);
    }

    public function show() {
        $data["data"] = $this->model->listarCategorias();
        $data["fav"] = $this->prodModel->listarFav();
        $this->view->show("HomeView.php", $data);
    }

    public function agregarFav() {
        echo $this->prodModel->agregarFav();
    }

    public function eliminarDelCarro() {
        echo $this->model->eliminarProdCarro();
    }

    /* Falta guardar una lista de productos para cargar la vista */
    public function carrito() {
        session_start();
        $data = $this->model->ListarCarrito();
        $this->view->show("Carrito.php", $data);
    }

    public function listarProductos() {
        print_r($this->model->listarProductos());
    }

    public function agregarCarro() {
        echo $this->model->agregarProdCarro();
    }

    public function agregarProductos() {
        $data['CATEGORIAS'] = $this->model->listarCategorias();
        $this->view->show("InsertarProductoView.php", $data);
    }

    public function eliminarProductos() {
        $data = $this->model->listarP();
        $this->view->show("EliminarProductoView.php", $data);
    }

    public function crearPromociones() {
        $this->view->show("CrearPromoView.php", null);
    }

    /* usado con ajax */
    public function insertarProducto() {
        $this->model->insertarProducto();
        $data['CATEGORIAS'] = $this->model->listarCategorias();
        $this->view->show("InsertarProductoView.php", $data);
    }

    public function eliminarProducto() {
        print_r($this->model->eliminarProducto());
    }

    public function ordenarProductos() {
        print_r($this->model->ordenarProductos());
    }

    public function listarFav() {
        print_r($this->prodModel->listarFav());
    }

    public function BuscarNombre() {
        echo json_encode($this->prodModel->BuscarNombre());
    }

    public function salir() {
        session_destroy();
        header("Location:?controller=Login&action=show");
    }

}
