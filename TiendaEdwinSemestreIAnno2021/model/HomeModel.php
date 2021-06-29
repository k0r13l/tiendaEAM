<?php

require_once 'public/ApiConnect.php';
require_once 'lib/Config.php';

class HomeModel {

    public function __construct() {
        $this->connect = new ApiConnect();
    }

    public function ListarCarritoModel() {
        $config = Config::getInstance();
        return $this->connect->GET($config->get('apiURL') . '?' . 'ACTION=LISTAR_CARRO&ID_US=' .$_SESSION['ID_USUARIO']);
    }

    public function listarCategorias() {
        $config = Config::getInstance();
        return json_decode($this->connect->GET($config->get('apiURL') . '?ACTION=LISTAR_CATEGORIAS'), true);
    }

    public function listarProductos() {
        $config = Config::getInstance();
        return $this->connect->GET($config->get('apiURL') . '?' . 'ACTION=FILTRAR_PRODUCTOS_POR_CAT&NOMBRE_CAT=' . $_POST['N_CAT']);
    }

    public function listarP() {
        $config = Config::getInstance();
        return json_decode($this->connect->GET($config->get('apiURL') . '?' . 'ACTION=LISTAR_PRODUCTOS'), true);
    }

    public function agregarProdCarro() {
        $config = Config::getInstance();
        $data['ID_US'] = $_POST['ID_US'];
        $data['COD_PROD'] = $_POST['COD_PROD'];
        $data['ACTION'] = 'AGREGAR_CARRO';
        return json_decode($this->connect->POST($config->get('apiURL'), $data), true);
    }

    public function eliminarProdCarro() {
        $config = Config::getInstance();
        $data['ID_US'] = $_POST['ID_US'];
        $data['COD_PROD'] = $_POST['COD_PROD'];
        $data['ACTION'] = 'ELIMINAR_CARRO';
        return json_decode($this->connect->POST($config->get('apiURL'), $data), true);
    }

    public function ListarCarrito() {
        $config = Config::getInstance();
        return json_decode($this->connect->GET($config->get('apiURL') . '?' . 'ACTION=LISTAR_CARRO&ID_US=' . $_SESSION['ID_USUARIO']), true);
    }



    public function insertarProducto() {
        $config = Config::getInstance();
        $data['ACTION'] = 'REGISTRAR_PROD';
        $data['nombre'] = $_POST['nombreProducto'];
        $data['precio'] = $_POST['precioProducto'];
        $data['cantidad'] = $_POST['cantidadProducto'];
        $data['desc'] = $_POST['descProducto'];
        $data['categoria'] = $_POST['selectCategorias'];

        # definimos la carpeta destino
        $carpetaDestino="./public/img/";

        # si hay algun archivo que subir
        if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0])
        {

            if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
            {
                $origen=$_FILES["archivo"]["tmp_name"];
                $destino=$carpetaDestino.$_FILES["archivo"]["name"];
                # movemos el archivo
                if(@move_uploaded_file($origen, $destino))
                {
                    $data["img"] = $destino;
                }else{
                    echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"];
                }
            }else{
                echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
            }
        }else{
            echo "<br>No se ha subido ninguna imagen";
        }

        $this->connect->POST($config->get('apiURL'), $data);
    }

    /* marca */


    public function eliminarProducto() {
        $config = Config::getInstance();
        return json_decode($this->connect->DELETE($config->get('apiURL') . '?' . 'ACTION=ELIMINAR_PROD&id='.$_POST['idP']), true);
    }

    public function ordenarProductos() {
        $config = Config::getInstance();
        return $this->connect->GET($config->get('apiURL') . '?' . 'ACTION=ORDENAR_PRODUCTOS&ORDEN=' . $_POST['orden']);
    }

}
