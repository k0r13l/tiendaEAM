<?php
require_once 'public/header.php';
?>
<link rel="stylesheet" type="text/css" href="public/css/loginStyle.css"/>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Icono del usuario -->
        <div class="fadeIn first">
            <img src="public/img/user.svg" id="icon"
            alt="Icono de usuario generico" />
        </div>
        <form action="?controller=Login&action=iniciarSesion" method="POST">
            <input type="text" id="nombreProducto" class="fadeIn second"
            name="nombreProducto" placeholder="Nombre">
            <input type="text" id="precioProducto" class="fadeIn third" name="precioProducto"
            placeholder="Precio">
            <input type="text" id="cantidadProducto" class="fadeIn third" name="cantidadProducto"
            placeholder="Cantidad">
            <input type="text" id="descProducto" class="fadeIn third" name="descProducto"
            placeholder="Descripcion">
            <!-- Select con las categorías -->
            <?php
            if(isset($var['CATEGORIAS'])) {
                foreach($var['CATEGORIAS'] as $item) {
                    echo '<option value="' . $item[0] . '">' . $item[1] . '</option>';
                }
            }
            ?>
            <input type="submit" class="fadeIn fourth" value="Entrar">
        </form>
    </div>
</div>
<?php
require_once 'public/footer.php';
?>
