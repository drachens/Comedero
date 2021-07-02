<?php
    include_once("header.php");
    $rut = $_SESSION["rut"];
    $imc = $_GET["imc"];
    $animal = $_GET["tipo"];
    include_once("navbar.php");
    include_once("./back/conexion.php");
    $query = "SELECT nombre,id_mascota FROM mascotas WHERE mascotas.rut_dueno = '$rut'";
    $result = mysqli_query($conn, $query);
?>
<div class="d-flex m-5 flex-row justify-content-center text-center align-items-center mb-3 mt-3">
    <div class="col-lg-6 col-md-8 col-sm-12 my-2 bg-black3 rounded ">
        <h2 class="font-weight-bold text-uppercase my-4">Calcula el IMC de tu mascota</h2>
        <form action="./back/calcular_imc.php" method="POST">
            <div class="d-flex flex-column col-12 mb-4 justify-content-center align-items-center">
                <div class="col-12">
                    <select class="form-control form-control-lg" name="id_mascota">
                        <option value="none">Elige una de tus mascotas...</option>
                    <?php 
                        while($row = mysqli_fetch_array($result)){
                    ?>
                        <option value="<?php print($row["id_mascota"]); ?>"><?php print($row["nombre"]); ?></option>
                    <?php 
                        }
                    ?>
                    </select>
                </div>
                <div class="col-6 text-center mt-3">
                    <h3>Ingresa su peso:</h3>
                </div>
                <div class="col- mt-1">
                    <input type="number" id="peso" class="form-control" placeholder="120" name="peso" required/>
                    <label class="form-label" for="peso">Peso en kg.</label>       
                </div>
                <div class="col-6 mt-4 mb-3">
                    <button class="btn-lg btn-primary">CALCULAR</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if($imc){
?>
<div class="d-flex m-5 flex-row justify-content-center text-center align-items-center mb-3 mt-3">
    <div class="col-lg-6 col-md-8 col-sm-12 my-2 bg-black3 rounded">    
        <div class="d-flex flex-column col-12 mb-4 justify-content-center align-items-center ">
            <div class="col-12 justify-content-center align-items-center">
                    <div class="d-flex flex-column col-12 text-center my-3 align-items-center">
                        <div class="col-12 my-1 bg-black3 rounded">
                            <h2>Nombre: <?php print($_SESSION["nombreMascota"]); ?></h2>
                        </div>
                    </div>
                    <div class="d-flex flex-row col-12 my-2 bg-black3 my-3 align-items-center rounded">
                        <div class="col-6">
                            <h3>IMC: <?php print($_SESSION["imc"]); ?></h3>
                        </div>
                        <div class="col-6">
                            <h4>Estado:</h4> 
                            <h4><?php print($_SESSION["estado"]); ?></h4>
                        </div>
                    </div>
                    <div class="d-flex flex-row col-12 my-2 bg-black3 my-3 align-items-center justify-content-center rounded">
                        <div class="col-6">
                            <h4>Peso: <?php print($_SESSION["peso"]); ?>kg</h4>
                        </div>
                    </div>
                    <div class="d-flex flex-row col-12 my-2 bg-black3 my-3 align-items-center rounded">
                        <div class="col-6">
                            <h5>Rango de peso:</h5>
                            <?php
                                if($_SESSION["peso_min"]>0){
                            ?>
                            <h5><?php print($_SESSION["peso_min"]); ?>kg - <?php print($_SESSION["peso_max"]); ?>kg</h5>
                            <?php
                                }else{
                            ?>
                            <h5>peso fuera de rango.</h5>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="col-6">
                            <h5>Rango de comida:</h5>
                            <?php
                                if($_SESSION["comida_min"]>0){
                            ?>
                            <h5><?php print($_SESSION["comida_min"]); ?>g - <?php print($_SESSION["comida_max"]); ?>g</h5>
                            <?php
                                }
                                else{
                            ?>
                            <h5>comida fuera de rango.</h5>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column col-12 my-2 bg-black3 my-3 justify-content-center align-items-center rounded">
                        <div class="col-6">
                            <h5>Comida utilizada:</h5>
                        </div>
                        <div class="col-12">
                            <h5><?php print($_SESSION["comida"]); ?></h5>
                        </div>
                    </div>
            </div>        
        </div>
    </div>
</div>

<?php 
    }
    else{
?>
<div class="d-flex m-5 flex-row justify-content-center text-center align-items-center mb-3 mt-3">
    <div class="col-lg-6 col-md-8 col-sm-12 my-2 bg-black3 ">
        <h4 class="font-weight-bold text-uppercase my-4">Aun no seleccionas ninguna mascota.</h4>
    </div>
</div>
<?php
    }
    include_once("footer.php");
?>