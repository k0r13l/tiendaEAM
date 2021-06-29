<?php
require_once 'public/header.php';

?>
<script src="public/js/utilityScripts.js"></script>
<div class="row">
    <aside class="col-lg-9">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-borderless table-shopping-cart">
                    <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th scope="col">Producto</th>
                            <th scope="col" width="120">Cantidad</th>
                            <th scope="col" width="120">Precio</th>
                            <th scope="col" class="text-right d-none d-md-block" width="200"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($var)) {
                            $total = 0;
                            foreach ($var as $item) {
                                $total += $item['PRECIO'];
                                ?>
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside">
                                                <!-- Imagen del producto -->
                                                <img src="<?php echo $item['IMG']; ?>" class="img-sm">
                                            </div>
                                            <figcaption class="info">
                                                <a href="#" class="title text-dark"><?php echo $item['NOMBRE']; ?></a>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                         <!--  echo '<input type="text" id="input'.$item["NOMBRE"].'" name="input'.$item["NOMBRE"].'" value="">';-->
                                        <a href="javascript:void(0)" onclick="eventoRestar(this)" id = "<?php echo $item["NOMBRE"] ?>" class = "btn btn-light btn-round">-</a>
                                        <var id="<?php echo $item["NOMBRE"]; ?>">1</var>
                                        <a href="javascript:void(0)" onclick="eventoSumar(this)" id = "<?php echo $item["NOMBRE"] ?>" class = "btn btn-light btn-round">+</a>

                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <!-- Precio unitario -->
                                            <var class="price">$</var>
                                            <var id = "precio<?php echo $item["NOMBRE"] ?>" class="price"><?php echo $item['PRECIO']; ?></var>
                                            <br>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <!-- Botones de añadir a favoritos y eliminar -->
                                    <td class="text-right d-none d-md-block">
                                        <a href="?controller=Home&action=carrito" onclick="eventoEliminar(<?php echo $item["CODIGO"]?>,<?php echo $_SESSION['ID_USUARIO']?>)" id="a<?php echo $item["NOMBRE"] ?>" class="btn btn-light btn-round"> Eliminar</a>
                                        <!--<a class="cart-button" href="?controller=Home&action=carrito">-->
                                    </td>
                                </tr>
                                <!-- Cierre del if y el foreach -->
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div> <!-- table-responsive.// -->
        </div> <!-- card.// -->
    </aside> <!-- col.// -->
    <aside class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <dl class="dlist-align">
                    <dt>Total:</dt>
                    <dd id = "total" class="text-right"><?php
                        if (isset($total)) {
                            echo $total;
                            ?></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Descuento:</dt>
                        <dd class="text-right text-danger">-$</dd>
                        <dd id = "descuento" class="text-right text-danger"><?php echo $total * 0.1; ?></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total a pagar:</dt>
                        <dd class="text-right text-dark b "  ><strong id = "totalPagar"><?php
                                echo $total - $total * 0.1;
                            }
                            ?></strong></dd>
                </dl>
                <hr>
                <p class="text-center mb-3">
                    <img src="public/img/visa.jpg" width="110" height="40">
                </p>
                <a href="?controller=Home&action=carrito" onclick="eventoPagar(this)" class="btn btn-primary btn-block"> Pagar </a>
                <a href="?controller=Home&action=show" class="btn btn-light btn-block"> Continuar comprando </a>
            </div> <!-- card-body.// -->
        </div> <!-- card.// -->
    </aside> <!-- col.// -->
</div> <!-- row.// -->
<?php
require_once 'public/footer.php';
?>
