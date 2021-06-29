<link rel="stylesheet" href="public/css/leftbarStyle.css">
<script src="public/js/utilityScripts.js"></script>
<script src="public/js/leftbarJS.js"></script>
<nav id="sidebar" class="">
    <ul class="list-unstyled components">
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse"
               aria-expanded="false" class="dropdown-toggle">
               <?php
               //session_start();
               if($_SESSION['TIPO'] == 'USER') {
                   echo 'Categorías';
                   echo '</a>';
                   echo '<ul class="collapse list-unstyled" id="homeSubmenu">';
                   foreach ($var['data'] as $item) {
                       echo '<li><a href="javascript:void(0)" onclick="mostrarProductoByCat(this)">' . $item[1] . '</a></li>';
                   }
               } else {
                   echo 'Opciones';
                   echo '</a>';
                   echo '<ul class="collapse list-unstyled" id="homeSubmenu">';
                   $var = array(
                       0 => array(
                           0 => '?controller=Home&action=agregarProductos',
                           1 => 'Agregar productos'
                       ),
                       1 => array(
                           0 => '?controller=Home&action=eliminarProductos',
                           1 => 'Eliminar productos'
                       ),
                       2 => array(
                           0 => '?controller=Home&action=crearPromociones',
                           1 => 'Crear promociones'
                       ),
                   );
                   foreach ($var as $item) {
                       echo '<li><a href="' . $item[0] . '">' . $item[1] . '</a></li>';
                   }
               }
                ?>
            </ul>
        </li>
    </ul>
    <ul class="list-unstyled CTAs">

    </ul>
</nav>
<button id="sidebarCollapse" type="button" name="button">-></button>
