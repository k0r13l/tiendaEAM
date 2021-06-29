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
        <form action="?controller=Login&action=iniciarSesion" method="POST">
            <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuario">
            <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" value="Entrar">
        </form>
        <!-- Fomulario para registrarse -->
        <form action="?controller=Login&action=showRegistrarse" method="POST">
            <input type="submit" class="fadeIn fourth" value="Registrarse">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">¿Olvidó su contraseña?</a>
        </div>
    </div>
</div>
<?php
require_once 'public/footer.php';
?>
