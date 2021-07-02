<?php
    $id = $_GET["id"];
    include_once("conexion.php");
        $sql = "DELETE FROM mascotas WHERE mascotas.id_mascota = $id";
        if (mysqli_query($conn, $sql)) {
            header('Location: ../mascota_menu.php');
            } else {
                echo "Error: " . $sql . mysqli_error($conn);
            }
                  
            mysqli_close($conn);
?>