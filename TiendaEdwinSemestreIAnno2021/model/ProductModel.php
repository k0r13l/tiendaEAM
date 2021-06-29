<?php

require_once 'lib/SPDO.php';

class ProductModel {

    public function __construct() {
        $this->db = SPDO::getInstance();
    }

    public function BuscarNombre() {
        $query = $this->db->prepare('call sp_buscarProdNombre(?)');
        $query->execute([$_POST['NOMBRE_P']]);
        $data = $query->fetchAll();
        $query->closeCursor();
        return $data;
    }

    public function agregarFav() {
        $sql = "call sp_agregar_fav(?,?)";
        $this->db->prepare($sql)->execute([$_POST['COD_PROD'], $_POST['ID_US']]);
    }

    public function listarFav() {
        session_start();
        $query = $this->db->prepare('call sp_lista_fav(?)');
        $query->execute([$_SESSION['ID_USUARIO']]);
        $data = $query->fetchAll();
        $query->closeCursor();
        return $data;
    }

}
