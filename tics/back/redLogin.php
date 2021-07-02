<?php
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];
    $key = $_GET["key"];
    $servername = "localhost";
    $database = "comedero";
    $username = "comedero";
    $password = "piermartiri";
    if ($key == 'cerrar') {

		$idSession = session_id();
		echo "$idSession";
		setcookie(session_name(),'',0,'/');
        session_destroy();
		header("Location: /tics");

	}
    else{
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Check connection

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $sql = "SELECT rut FROM usuarios WHERE correo = '$correo' AND pass = '$pass'"; //Busca rut en base
            $result = $conn->query($sql);
        }   

        if ($result->num_rows > 0) {
            session_id("uwu");
            session_start();
            $_SESSION["correo"] = $correo;
            //header("Location: ../inicio.php");
            header("Location: session.php?key=".$correo);
            
        }
        else{
            header("Location: ../ingresa.php?key=err");
        }

        mysqli_close($conn);
    }

    ?>