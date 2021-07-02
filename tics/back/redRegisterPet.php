<?php
    session_id("uwu");
    session_start();
    $option = $_GET["tipo"];
    $rut = $_SESSION["rut"];
    $nombre=$_POST["nombre"];
    $edad = intval($_POST["edad"]);
    $tamaño=intval($_POST["tamaño"]);
    $tipo = $_POST["tipo"];
    $raza = $_POST["raza"];
    $sexo = $_POST["sexo"];
    $comedero = intval($_POST["comedero"]);
    $servername = "localhost";
    $database = "comedero";
    $username = "comedero";
    $password = "piermartiri";

    if($tipo == "gato"){
        $foto = "gato.jpeg";
    }
    else{
        $foto = "perro.jpg";
    }

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
       /* print($nombre);
        print($rut);
        print($edad);
        print($tamaño);
        print($tipo);
        print($raza);
        print($sexo);
        print($comida);
        print(strlen($edad));*/
        $sql_name = "SELECT * FROM mascotas WHERE nombre = '$nombre'"; //Busca nombre en base
        $result_name = $conn->query($sql_name);
        $sql_comedero = "SELECT * FROM mascotas WHERE mascotas.id_comedero = $comedero";
        $result_comedero = $conn->query($sql_comedero);
        }
    if($option == "perro"){
        $comida = intval($_POST["comida_p"]);
        if(preg_match("/^[a-zA-Z]{0,}$/",$nombre) == 0){ //Nombre sin numeros ni simbolos ni espacios
            header("Location: ../agregar_mascota.php?tipo=perro&err=name");
            exit();
        }
        elseif($edad>276 OR $edad < 1){ //Edad no mayor a 27 años o menor que 1 mes.
            header("Location: ../agregar_mascota.php?tipo=perro&err=age");
            exit();          
        }
        elseif($tamaño>160 OR $tamaño < 10){ //Tamaño no mayor a 160cm o tamaño menor a 10cm.
            header("Location: ../agregar_mascota.php?tipo=perro&err=size");
            exit();
        }
        elseif($comida == 0){ //Error, debe ingresar comida
            header("Location: ../agregar_mascota.php?tipo=perro&err=comida");
            exit();
        }
        elseif($result_name->num_rows > 0){
            header("Location: ../agregar_mascota.php?tipo=perro&err=errRepeat");
            exit();
        }
        elseif($result_comedero->num_rows > 0){     //Error comedero registrado
            header("Location: ../agregar_mascota.php?tipo=perro&err=ComederoRed");
            exit();
        }
        elseif($comedero < 1){      //Error al ingresar comedero id 0 o negativo
            header("Location: ../agregar_mascota.php?tipo=perro&err=come");
            exit();
        }
        else{
            $sql_registrar = "INSERT INTO mascotas (nombre, edad, id_comedero, tamano, rut_dueno,
            tipo, raza, sexo, id_comida, peso, imc, foto) 
            VALUES ('$nombre', $edad, $comedero, $tamaño, '$rut', '$tipo', '$raza', '$sexo', $comida, 
            1.0, 1.0, '$foto')";            
        }
    }
    else{
        $comida = intval($_POST["comida_g"]);
        $torax = intval($_POST["caja"]);
        $pierna = intval($_POST["pierna"]);
        $raza = "sin raza";
        if(preg_match("/^[a-zA-Z]{0,}$/",$nombre) == 0){ //Nombre sin numeros ni simbolos ni espacios
            header("Location: ../agregar_mascota.php?tipo=gato&err=name");
            exit();
        }
        elseif($edad>276 OR $edad < 1){ //Edad no mayor a 27 años o menor que 1 mes.
            header("Location: ../agregar_mascota.php?tipo=gato&err=age");
            exit();          
        }
        elseif($comida == 0){ //Error, debe ingresar comida
            header("Location: ../agregar_mascota.php?tipo=gato&err=comida");
            exit();
        }
        elseif($torax < 0 OR $torax > 200){
            header("Location: ../agregar_mascota.php?tipo=gato&err=torax"); //Tamaño de torax incorrecto
            exit();
        }
        elseif($pierna < 0 OR $pierna > 50){
            header("Location: ../agregar_mascota.php?tipo=gato&err=pierna");   //Error tamaño pierna
            exit();
        }
        elseif($result_name->num_rows > 0){
            header("Location: ../agregar_mascota.php?tipo=gato&err=errRepeat"); //Mascota repetida
            exit();
        }
        elseif($result_comedero->num_rows > 0){     //Error comedero registrado
            header("Location: ../agregar_mascota.php?tipo=gato&err=ComederoRed");
            exit();
        }
        elseif($comedero < 1){      //Error al ingresar comedero id 0 o negativo
            header("Location: ../agregar_mascota.php?tipo=gato&err=come");
            exit();
        }
        else{
            $sql_registrar = "INSERT INTO mascotas (nombre, edad, id_comedero, tamano, rut_dueno,
            tipo, raza, sexo, id_comida, peso, pierna, torax, imc, foto) 
            VALUES ('$nombre', $edad, $comedero, $tamaño, '$rut', '$tipo', '$raza', '$sexo', $comida, 
            1.0, $pierna, $torax, 1.0, '$foto')";            
        }
    }    

 if (mysqli_query($conn, $sql_registrar)) {
    echo "New record created successfully";
    header('Location: ../mascota_menu.php');
    } else {
        echo "Error: " . $sql . mysqli_error($conn);
    }
          
    mysqli_close($conn);

    
?>