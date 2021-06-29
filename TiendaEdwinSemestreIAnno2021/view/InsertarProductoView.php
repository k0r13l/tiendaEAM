<?php
require_once 'public/header.php';
?>
<script src="public/js/utilityScripts.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/loginStyle.css"/>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Icono del usuario -->
        <div class="fadeIn first">
            <img src="public/img/user.svg" id="icon"
            alt="Icono de usuario generico" />
        </div>
         <form action="?controller=Home&action=insertarProducto" method="post"
             enctype="multipart/form-data"
             name="inscripcion">
            <input type="text" id="nombreProducto" class="fadeIn second"
            name="nombreProducto" placeholder="Nombre">
            <input type="text" id="precioProducto" class="fadeIn third" name="precioProducto"
            placeholder="Precio">
            <input type="text" id="cantidadProducto" class="fadeIn third" name="cantidadProducto"
            placeholder="Cantidad">
            <input type="text" id="descProducto" class="fadeIn third" name="descProducto"
            placeholder="Descripcion">
            <br>
            <br>
            <!-- Prueba para insertar una imagen -->
            <input  type="file"  class="form-control" accept="image/png, .jpeg, .jpg, image/gif" id="archivo" name="archivo">
            <!-- Select con las categorías -->
            <br>
            <?php
            if(isset($var['CATEGORIAS'])) {
                echo '<select  id="selectCategorias" name="selectCategorias" class="form-select" aria-label="Default select example">';
                foreach($var['CATEGORIAS'] as $item) {
                    echo '<option value="' . $item[0] . '">' . $item[1] . '</option>';
                }
                echo '</select>';
                echo '<br>';
            }
            ?>
            <input type="submit" value="Enviar">
        </form>
    </div>
</div>
<?php
require_once 'public/footer.php';
?>
