<?php
        include_once("header.php");
        include_once("navbar.php");
        $nombre = $_GET["nombre"];
        $id = $_GET["id"];
?>
<div class="d-flex flex-row my-3 justify-content-center align-items-center">
    <div class="justify-content-center align-items-center col-lg-7 col-md-8 col-sm-12 bg-black3 text-center">
        <div class="p-2 mt-2 col-12 justify-content-center align-items-center">
            <div class="p-2 mt-2 col-12 justify-content-center align-items-center">
                <h3>¿Estas seguro de que quieres eliminar a <?php echo($nombre); ?> ?</h3>
            </div>
        </div>
        <div class="d-flex flex-row mt-2 col-12 mb-4 justify-content-center align-items-center">
            <div class="col-6">
                <a href="mascota_menu.php"><button class="btn btn-secondary">VOLVER</button></a>
            </div>
            <div class="col-6">
                <a href="./back/borrar_mascota.php?id=<?php echo($id); ?>"><button class="btn btn-primary">ELIMINAR</button></a>
            </div>
        </div>
    </div>
</div>

<?php

?>