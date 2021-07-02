<?php
session_id("uwu");
session_start();
$correo = $_GET["key"];
if($correo == "cerrar"){
    echo("xd");
}
else{
    $servername = "localhost";
    $database = "comedero";
    $username = "comedero";
    $password = "piermartiri";
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        print("1");
        $sql_rut = "SELECT * FROM usuarios WHERE correo = '$correo'"; //Busca rut en base
        print("2");
        $sql_result = mysqli_query($conn,$sql_rut);

        while($row = mysqli_fetch_array($sql_result))
        { 
            $_SESSION["nombreUs"] = $row["nombre"];
            $_SESSION["apellidoUs"] = $row["apellido"];
            $_SESSION["rut"] = $row["rut"];
            $_SESSION["correo"] = $row["correo"];
      
         } 
        mysqli_free_result($sql_result);
        mysqli_close($conn);
    } 
}
header("Location: ../inicio.php");
exit();
?>
