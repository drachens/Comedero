<?php
    include_once("header.php");
    include_once("navbar.php");
    $tipo = $_GET["tipo"];
    if(!$tipo){
?>
<div class="container col-lg-6 col-sm-12 mt-3 mb-3 text-center">
    <div class="d-flex flex-column bg-black3 col-12 justify-content-center text-align-center">
        <div class="col-12 my-3">
            <h1>Elige el tipo de mascota</h1>
        </div>
        <div class="col-12 mt-4 mb-4">
            <div class="d-flex flex-row align-items-stretch " style="height:100px;">
                <a  href="agregar_mascota.php?tipo=gato" class="d-flex justify-content-center align-items-center col-6 bg-light text-dark m-1"><div>
                    <h2>GATO</h2>
                </div></a>
                <a href="agregar_mascota.php?tipo=perro"  class="d-flex justify-content-center align-items-center col-6 card-buton bg-dark text-light m-1"><div>
                    <h2>PERRO</h2>
                </div></a>
            </div>
        </div>
        <div class="d-flex col-12 justify-content-center align-items-center mb-4">
            <a href="mascota_menu.php"><button class="btn btn-lg btn-success">ATRAS</button></a>
        </div>
    </div>
</div>

<?php
    }
    else{
        if($tipo == "perro"){
?>

<!-- PERROS -->

<div class = "d-flex flex-column justify-content-center align-items-center col-12 mt-3 mb-3 ">
    <div class = "d-flex flex-column justify-content-center align-items-center bg-beige col-md-8 col-sm-12 rounded">
        <h2 class="pd-10 font-weight-bold text-uppercase">Agrega una Mascota</h2>
        <form action="./back/redRegisterPet.php?tipo=perro" method="POST">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="d-flex flex-row mb-4 col-12">
                <div class="col-4">
                    <div class="form-outline">
                        <input type="text" id="nombre" class="form-control" placeholder="Lucifer" name="nombre" required/>
                        <label class="form-label" for="nombre">Nombre</label>                    
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-outline">
                        <input type="number" id="edad" class="form-control" placeholder="12" name="edad" required/>
                        <label class="form-label" for="edad">Edad en meses</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-outline">
                        <input type="number" id="tamaño" class="form-control" placeholder="120" name="tamaño" required/>
                        <label class="form-label" for="tamaño">Altura en cm</label>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-4 col-12">
                <div class="col-4">
                    <div class="form-outline mb-4">
                    <select class="form-control" name="sexo" required>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                    <label class="form-label" for="sexo">Sexo</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-outline mb-4">
                        <select class="form-control" name="tipo" required>
                            <option value="perro">Perro</option>
                        </select>
                        <label class="form-label" for="tipo">Tipo</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-outline mb-4">
                        <select class="form-control" name="raza" required>
                            <option value="akita">Akita</option>
                            <option value="beagle">Beagle</option>
                            <option value="boxer">Boxer</option>
                            <option value="chihuahua">Chihuahua</option>
                            <option value="pastor aleman">Pastor Aleman</option>
                        </select>
                        <label class="form-label" for="raza">Raza</label>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-4 col-12 justify-content-center">
                <div class="col-5">
                    <div class="form-outline">
                        <select class="form-control" name="comida_p" required>
                            <option value="0">Sin comida</option>
                            <option value="1">Purina Pro Plan Adulto Razas Pequeñas</option>
                            <option value="2">Purina Pro Plan Adulto Razas Medianas</option>
                            <option value="4">Purina Pro Plan Adulto Razas Grandes</option>
                        </select>
                        <label class="form-label" for="comida_p">Comida Perro</label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-outline">
                        <input type="number" id="comedero" class="form-control" placeholder="120" name="comedero" required/>
                        <label class="form-label" for="comedero">ID Comedero</label>
                    </div>
                </div>
            </div>

           <!-- <div class="d-flex flex-row mb-4 col-12">
                <div class = "col-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto"/>
                        <label class="custom-file-label" for="foto">Sube una foto</label>
                    </div>
                </div>
            </div> -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Agregar mascota</button>
        </form>
        <p><a class="font-weight-bold" href="mascota_menu.php">Volver a menu mascotas</a>.</p>
    </div>
    <div class = "d-flex flex-column justify-content-center align-items-center bg-beige col-md-8 col-sm-12 mt-5 rounded">
        <div>
            <h2 class="text-uppercase my-2">Informaciones</h2>
        </div>
        <div class="my-2">
            <img src="./imagenes/medidas_perro.jpeg">
        </div>
    </div>
 </div>

 <!-- GATOS -->


 <?php
        }
        else{
 ?>

<div class = "d-flex flex-column justify-content-center align-items-center col-12 mt-3 mb-3 ">
    <div class = "d-flex flex-column justify-content-center align-items-center bg-beige col-md-8 col-sm-12 rounded">
        <h2 class="pd-10 font-weight-bold text-uppercase">Agrega una Mascota</h2>
        <form action="./back/redRegisterPet.php?tipo=gato" method="POST">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="d-flex flex-row mb-4 col-12 justify-content-center">
                <div class="col-5">
                    <div class="form-outline">
                        <input type="text" id="nombre" class="form-control" placeholder="Lucifer" name="nombre" required/>
                        <label class="form-label" for="nombre">Nombre</label>                    
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-outline">
                        <input type="number" id="edad" class="form-control" placeholder="12" name="edad" required/>
                        <label class="form-label" for="edad">Edad en meses</label>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-4 col-12 justify-content-center">
                <div class="col-5">
                    <div class="form-outline mb-4">
                    <select class="form-control" name="sexo" required>
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                    <label class="form-label" for="sexo">Sexo</label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-outline mb-4">
                        <select class="form-control" name="tipo" required>
                            <option value="gato">Gato</option>
                        </select>
                        <label class="form-label" for="tipo">Tipo</label>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-4 col-12 justify-content-center">
                <div class="col-5">
                    <div class="form-outline mb-4">
                        <input type="number" id="caja" class="form-control" placeholder="12" name="caja" required/>
                        <label class="form-label" for="caja">Circunferencia Toráxica en cm</label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-outline mb-4">
                        <input type="number" id="pierna" class="form-control" placeholder="12" name="pierna" required/>
                        <label class="form-label" for="pierna">Largo de pierna en cm</label> 
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row mb-4 col-12 justify-content-center">
                <div class="col-5">
                    <div class="form-outline">
                        <select class="form-control" name="comida_g" required>
                            <option value="0">Sin comida</option>
                            <option value="3">Purina Pro Plan Gato Adulto</option>
                        </select>
                        <label class="form-label" for="comida_g">Comida Gato</label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-outline">
                        <input type="number" id="comedero" class="form-control" placeholder="120" name="comedero" required/>
                        <label class="form-label" for="comedero">ID Comedero</label>
                    </div>
                </div>
            </div>

           <!-- <div class="d-flex flex-row mb-4 col-12">
                <div class = "col-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto"/>
                        <label class="custom-file-label" for="foto">Sube una foto</label>
                    </div>
                </div>
            </div> -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Agregar mascota</button>
        </form>
        <p><a class="font-weight-bold" href="mascota_menu.php">Volver a menu mascotas</a>.</p>
    </div>
    <div class = "d-flex flex-column justify-content-center align-items-center bg-beige col-md-8 col-sm-12 mt-5 rounded">
        <div>
            <h2 class="text-uppercase my-2">Informaciones</h2>
        </div>
        <div class="my-2">
            <img src="./imagenes/medida_gatos.jpg">
        </div>
        <div class="mt-3 mb-4">
            <p>El <mark class="font-weight-bold">largo de la pierna</mark> se obtiene midiendo desde el tobillo del gato hasta su rodilla.</p>
        </div>
    </div>
 </div>

<?php
        }
    }
    include_once("footer.php");
?>