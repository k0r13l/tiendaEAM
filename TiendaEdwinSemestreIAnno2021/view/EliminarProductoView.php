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
        <!-- Select con las categorías -->
        <?php
        if(isset($var)) {
            echo '<select  id="selectProductosE" name="selectProductosE" class="form-select" aria-label="Default select example">';
            foreach($var as $item) {
                echo '<option value="' . $item[0] . '">' . $item[1] . '</option>';
            }
            echo '</select>';
            echo '<br>';
        }
        ?>
        <a onclick="eliminarProducto(this)" class="fadeIn fourth">Eliminar</a>
    </div>
</div>
<?php
require_once 'public/footer.php';
?>
