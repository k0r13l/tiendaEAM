<?php
require_once 'public/header.php';
?>
<link rel="stylesheet" type="text/css" href="public/css/loginStyle.css"/>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Icono del usuario -->
        <div class="fadeIn first">
            <img src="public/img/user.svg" id="icon" alt="Icono de usuario generico" />
        </div>

        <!-- Fomulario para iniciar sesión -->
        <form method="POST">
            <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuario">
            <input type="text" id="pass" class="fadeIn third" name="pass" placeholder="Contraseña">
            <br>
            <br>
            <select  id="selectGenero" class="form-select" aria-label="Default select example">
                <option selected>Marque el género con el que se identifica</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="0">Otro</option>
            </select>
            <br>
            <input type="text" id="f_nac" class="fadeIn third" name="f_nac" placeholder="AA-MM-DD">
            <input type="text" id="direccion" class="fadeIn third" name="direccion" placeholder="Direccion">
            <input type="submit" class="fadeIn fourth" value="Registrarse" onclick="registrarUsuario()">
        </form>
    </div>
</div>
<?php
require_once 'public/footer.php';
?>