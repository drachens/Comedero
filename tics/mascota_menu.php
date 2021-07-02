<?php
    include_once("header.php");
    include_once("navbar.php");
    include_once("./back/conexion.php");
    $rut = $_SESSION["rut"];
    $nombre = $_SESSION["nombreUs"];

    $query = "SELECT * FROM mascotas WHERE mascotas.rut_dueno = '$rut'";
    $result = mysqli_query($conn, $query);
 ?>
 <div class="d-flex flex-column justify-content-center align-items-center bd-highlight mb-3 mt-3">
 <?php
    if($result->num_rows > 0){
        while($row = mysqli_fetch_array($result)){
?>
    <div class="p-2 bd-highlight col-lg-6 col-md-8 col-sm-12 bg-black3 mt-2 ">
        <div class="d-flex flex-row bd-highlight justify-content-center align-items-center">
            <div class="d-flex p-2 bd-highlight col-3 mt-2  ">
                <div class="justify-content-center align-items-center">
                    <img class="img_mascota" src=<?php print("'./imagenes/".$row["foto"]."'");?>>
                </div>
            </div>
            <div class="p-2 bd-highlight col-9 ml-2">
                <div class ="d-flex flex-row bd-highlight col-12">
                    <div class="d-flex align-items-center bd-highlight col-12 mb-3">
                        <h3 class = "text-uppercase"><?php print($row["nombre"]); ?></h3>
                    </div>                    
                </div>
                <div class ="d-flex flex-row bd-highlight col-12 ">
                    <div class="bd-highlight col-6">
                        <p>Dueño: <?php echo($nombre); ?>.</p>
                    </div>
                    <div class="bd-highlight col-6">
                        <p>Edad: <?php print($row["edad"]) ?> meses.</p>
                    </div>                   
                </div>
                <div class ="d-flex flex-row bd-highlight col-12 ">
                    <div class="bd-highlight col-6">
                        <p>Raza: <?php print($row["raza"]); ?>.</p>
                    </div>
                    <div class="bd-highlight col-6">
                        <p>Sexo: <?php print($row["sexo"]); ?>.</p>
                    </div>                   
                </div>
                <div class ="d-flex flex-row bd-highlight col-12 ">
                    <div class="bd-highlight col-6">
                        <p>Animal: <?php print($row["tipo"]); ?>.</p>
                    </div>
                    <div class="bd-highlight col-6">
                        <p>Tamaño: <?php print($row["tamano"]); ?> cm.</p>
                    </div>                   
                </div>
                <div class ="d-flex flex-row bd-highlight col-12 ">
                    <div class="bd-highlight col-6">
                        <p>Peso: <?php print($row["peso"]); ?> kg.</p>
                    </div>
                    <div class="bd-highlight col-6">
                        <p>IMC: <?php print($row["imc"]); ?>.</p>
                    </div>                   
                </div>                  
            </div>
            
        </div>
            <div class ="d-flex justify-content-center bd-highlight col-12 mb-2">
                <div class ="d-flex mx-1">
                    <button class = "btn btn-success">EDITAR</button>
                </div>
                <div class ="d-flex mx-1">
                   <a href="confirmarBorrarMascota.php?id=<?php print($row["id_mascota"]); ?>&nombre=<?php print($row["nombre"]); ?>"><button id="borrar" class = "btn btn-secondary">BORRAR</button></a>
                </div>    
            </div>
    </div>
    <?php
       }
    }
    else{
        ?>
        <div class="d-flex p-2 flex-row col-lg-6 col-sm-12 mt-3 justify-content-center align-items-center bd-highlight">
            <div class="col-12 justify-content-center align-items-center bg-black3">
                <h2 class="text-center mt-3 mb-1">No tienes mascotas registradas,</h2>
                <h2 class="text-center mb-3 mt-1">¡Haz click abajo y agrega la primera!</h2>
            </div>
        </div>

    <?php
    }
    ?>
    <div class="p-2 bd-highlight col-lg-6 col-md-8 col-sm-12 bg-black3 mt-2">
        <a href="agregar_mascota.php"><button type="button" class="btn btn-success btn-lg btn-block">Agregar Mascota</button></a>
    </div>  
</div>

<?php
    
    include_once("footer.php");
?>