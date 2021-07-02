<?php
    $nombre=$_POST["nombre"];
    $apellido = $_POST["apellido"];
    $rut=$_POST["rut"];
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];
    $servername = "localhost";
    $database = "comedero";
    $username = "comedero";
    $password = "piermartiri";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql_rut = "SELECT rut FROM usuarios WHERE rut = '$rut'"; //Busca rut en base
        $result_rut = $conn->query($sql_rut);

        $sql_correo = "SELECT correo FROM usuarios WHERE correo = '$correo'";
        $result_correo = $conn->query($sql_correo);
    }   
    if(strlen($pass)<6){ //si el largo del pass es menor a 6.
        header('Location: ../register.php?er=passE'); // error largo contraseña  
    }
    elseif(preg_match("/^[a-zA-Z]{0,}$/",$nombre) == 0){
        header('Location: ../register.php?er=nameE'); //Error en nombre o apellido
    }
    elseif(preg_match("/[a-zA-Z]+$/",$apellido) == 0){
        header('Location: ../register.php?er=apellE'); //Error en nombre o apellido
    }        
    elseif(preg_match("/\d{8}-(\d{1}|[kK]){1}$/",$rut) == 0){ //revisa el formato de rut
        header('Location: ../register.php?er=rutE2');  //error en rut
    }
    elseif ($result_rut->num_rows > 0) {
        // output data of each row
        header('Location: ../register.php?er=rutE'); // error rut registrado
    }

    elseif ($result_correo->num_rows > 0) {
        // output data of each row
        header('Location: ../register.php?er=mailE'); // error correo registrado
    }
    else{
        session_start();
        /*session_id($_POST['rut']);
		session_start();
		$_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['apellido'] = $_POST['apellido'];
		$_SESSION['correo'] = $_POST['correo'];
		$_SESSION['rut'] = $_POST['rut'];
		$_SESSION['pass'] = $_POST['pass'];*/
        $sql_registrar = "INSERT INTO usuarios (nombre, apellido, rut, correo, pass) 
            VALUES ('$nombre', '$apellido', '$rut', '$correo', '$pass')";
    }
 

if (mysqli_query($conn, $sql_registrar)) {
  echo "New record created successfully";
  header('Location: ../ingresa.php');
} else {
  echo "Error: " . $sql . mysqli_error($conn);
}

mysqli_close($conn);


    ?>