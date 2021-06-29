<?php
require_once 'public/header.php';
?>

<div class="container-fluid">
    <div class="row text-center">
        <div class="col-2 border">
            <?php
            require_once 'view/LeftbarView.php';
            ?>
        </div>
        <div class="col-10 border">
            <?php
            require_once 'view/HomeBodyView.php';
            ?>
        </div>
    </div>
</div>

<?php
require_once 'public/footer.php';
?>