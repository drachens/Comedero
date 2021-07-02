<?php
    session_id("uwu");
    session_start();   
    $_SESSION["comida_min"] = -1;
    $_SESSION["peso_min"] = -1; 
    $_SESSION["peso_min"] = -5;
    $id_m = intval($_POST["id_mascota"]);
    $peso_m = floatval($_POST["peso"]);
    include_once("conexion.php");
    if($peso_m > 0 AND $peso_m <= 70){
        $query_modPeso = "UPDATE mascotas SET peso = $peso_m WHERE mascotas.id_mascota = $id_m";
        if(mysqli_query($conn,$query_modPeso)){
            $query = "SELECT mascotas.nombre AS nombreM ,mascotas.tamano AS tamano, mascotas.peso AS peso, 
            mascotas.sexo AS sexo, mascotas.tipo AS tipo, mascotas.pierna AS pierna, 
            mascotas.torax AS torax, mascotas.raza AS raza, comidas.nombre AS nombreComida, 
            comidas.tipo AS tipo_comida FROM mascotas, comidas WHERE mascotas.id_mascota = $id_m 
            AND mascotas.id_comida = comidas.id";
            $result_busqueda = mysqli_query($conn,$query);
            if($result_busqueda->num_rows > 0){
                while($row = mysqli_fetch_array($result_busqueda)){
                    $nombre = $row["nombreM"];
                    $tamaño = $row["tamano"];
                    $peso = $row["peso"];
                    $sexo = $row["sexo"];
                    $tipo = $row["tipo"];
                    $pierna = $row["pierna"];
                    $torax = $row["torax"];
                    $raza = $row["raza"];
                    $comida = $row["nombreComida"];
                    $tipo_comida = $row["tipo_comida"];
                }
                if($tipo == "perro"){
                    //Caluclar IMC perro
                    $tamañoMetros = $tamaño/100;
                    $imc = $peso/($tamañoMetros*$tamañoMetros);
                    $query_updateIMC = "UPDATE mascotas SET imc = $imc WHERE mascotas.id_mascota = $id_m";
                    mysqli_query($conn,$query_updateIMC); //Actualiza IMC en base
                    $imc = intval($imc);
                    $query_estado = "SELECT estado FROM imc WHERE $imc >= imc.min AND $imc < imc.max AND 
                    imc.sexo = '$sexo' AND imc.tipo = '$tipo' AND imc.raza = '$raza'";
                    $result_estado = mysqli_query($conn,$query_estado);
                    while($row=mysqli_fetch_array($result_estado)){
                        $_SESSION["estado"] = $row["estado"];
                    }
                    //Consulta cantidad de comida que debe dar
                    $query_comida = "SELECT cantidad_comida.peso_min AS peso_min, 
                    cantidad_comida.peso_max AS peso_max, cantidad_comida.comida_min AS comida_min, 
                    cantidad_comida.comida_max AS comida_max FROM cantidad_comida, mascotas 
                    WHERE $peso > peso_min AND $peso <= peso_max AND cantidad_comida.id_comida = mascotas.id_comida 
                    AND mascotas.id_mascota = $id_m";
                    $result_comida = mysqli_query($conn,$query_comida);
                    while($row=mysqli_fetch_array($result_comida)){
                        $comida_min = $row["comida_min"];
                        $comida_max = $row["comida_max"];
                        $peso_min = $row["peso_min"];
                        $peso_max = $row["peso_max"];
                    }
                    $_SESSION["comida_min"] = $comida_min;
                    $_SESSION["comida_max"] = $comida_max;
                    $_SESSION["peso_min"] = $peso_min;
                    $_SESSION["peso_max"] = $peso_max;
                    $_SESSION["nombreMascota"] = $nombre;
                    $_SESSION["imc"] = $imc;
                    $_SESSION["peso"] = $peso;
                    $_SESSION["comida"] = $comida." ".$tipo_comida;
                    mysqli_close($conn);
                    header("Location: ../imc_inicio.php?imc=1");
                    exit();
                }
                else{
                    $x1 = ($torax/0.7067) - $pierna;
                    $imc = ($x1/0.9156) - $pierna;
                    $query_updateIMC = "UPDATE mascotas SET imc = $imc WHERE mascotas.id_mascota = $id_m";
                    mysqli_query($conn,$query_updateIMC); //Actualiza IMC en base
                    $imc = intval($imc);
                    $query_estado = "SELECT estado FROM imc WHERE $imc >= imc.min AND $imc < imc.max AND imc.tipo = '$tipo'";
                    $result_estado = mysqli_query($conn,$query_estado);
                    while($row=mysqli_fetch_array($result_estado)){
                        $_SESSION["estado"] = $row["estado"];
                    }
                    //Consulta cantidad de comida que debe dar
                    $query_comida = "SELECT cantidad_comida.peso_min AS peso_min, 
                    cantidad_comida.peso_max AS peso_max, cantidad_comida.comida_min AS comida_min, 
                    cantidad_comida.comida_max AS comida_max FROM cantidad_comida, mascotas 
                    WHERE $peso > peso_min AND $peso <= peso_max AND cantidad_comida.id_comida = mascotas.id_comida 
                    AND mascotas.id_mascota = $id_m";
                    $result_comida = mysqli_query($conn,$query_comida);
                    while($row=mysqli_fetch_array($result_comida)){
                        $_SESSION["comida_min"] = $row["comida_min"];
                        $_SESSION["comida_max"] = $row["comida_max"];
                        $_SESSION["peso_min"] = $row["peso_min"];
                        $_SESSION["peso_max"] = $row["peso_max"];
                    }
                    $_SESSION["nombreMascota"] = $nombre;
                    $_SESSION["imc"] = $imc;
                    $_SESSION["peso"] = $peso;
                    $_SESSION["comida"] = $comida." ".$tipo_comida;
                    mysqli_close($conn);
                    header("Location: ../imc_inicio.php?imc=1");
                    exit();
                }
            }
            else{
                echo "Error: " . $sql . mysqli_error($conn);
                //header("Location: ../imc_inicio.php?imc=0");
                exit();
            }
        }
        else{
            mysqli_close($conn);
            header("Location: ../imc_inicio.php?imc=0&err=1");
            exit();
        }

    }
    else{
        mysqli_close($conn);
        header("Location: ../imc_inicio.php?imc=0&err=2");
        exit();
    }
    
?>