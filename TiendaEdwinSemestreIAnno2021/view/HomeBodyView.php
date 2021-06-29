<script src="public/js/utilityScripts.js"></script>
<?php
include "public/banco.php";
?>
<div class="container d-flex justify-content-center">
    <div class="card mt-5 p-4">
        <!-- Cuadro de búsqueda y botton de buscar -->
        <div class="input-group mb-3"> <input type="text" class="form-control">
            <div class="input-group-append">
                <button class="btn btn-primary">
                    <i class="fas fa-search">Buscar</i>
                </button>
            </div>
        </div>
        <a id="aOrdenar" href="javascript:void(0)" onclick="ordenar(this)">Descendente</a>
         <var id="compra" href="javascript:void(0)">COMPRA: <?php echo $_SESSION['COMPRA']?> </var>
        <var id="venta" href="javascript:void(0)" >VENTA: <?php echo $_SESSION['VENTA']?> </var>
    </div>
</div>
<div class="card mt-5 p-4">
    <div id="divContenedor">
        <div class="divWrapper" >
<?php
if (isset($var["fav"])) {
?>
            <span class="text mb-4">
                <?php
                if (sizeof($var['fav']) > 1) {
                    echo sizeof($var['fav']) . 'favoritos';
                } else if (sizeof($var['fav']) == 1) {
                    echo sizeof($var['fav']) . ' favorito';
                } else {
                    echo 'No hay favoritos';
                }
                ?>
            </span>
<?php
foreach ($var["fav"] as $item) {
?>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" data-src="<?php echo $item['IMG'] ?>" alt="" style="height: 225px; width: 100%; display: block;" src="<?php echo $item['IMG'] ?>" data-holder-rendered="true">
            <div class="card-body">
                <p class="card-text"><?php echo $item['NOMBRE'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-light add-to-cart" onclick="AgregarCarro(<?php echo $item['CODIGO'] . ', ' . $_SESSION['ID_USUARIO'] ?>)" >carrito</a>
                    <br>
                    <a class="btn btn-light add-to-cart" onclick="AgregarFav(<?php echo $item['CODIGO'] . ', ' . $_SESSION['ID_USUARIO'] ?>)" >favorito</a>
                    </div>
                    <small class="text-muted">$<?php echo $item['PRECIO'] ?></small>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
?>
        </div>
    </div>
</div>
