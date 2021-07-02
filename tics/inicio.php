<?php
    include_once("header.php");
    include_once("navbar.php");
?>

<div class= "d-flex flex-column align-items-center pd-top3">
    <a href="mascota_menu.php">
    <div class="bg-blue text-black col-lg-5 col-md-8 col-sm-10 my-2">
    <img class="card-img oppa" src="./imagenes/5a1bbd3a243543.7868549015117673541483.png" alt="Card image">
    <div class="d-flex flex-column col-12 card-img-overlay justify-content-center my-3 align-items-center">
        <div class = "w-100 bg-black text-center rounded">
            <h3 class="card-title font-weight-bold texto-borde">Mascotas</h3>
        </div>
        <div class = "d-flex col-12 bg-black rounded">
        <p class="card-text font-weight-bold texto-borde">Agrega y revisa los datos de tu mascota en nuestra 
            App para llevar un seguimiento de ellas, de esta manera puedes tener información relevante
            para acudir al veterinario, o simplemente saber sobre la salud de tu mascota.</p>
    </div>
    </div>
    </a>
    </div>
    <a href="imc_inicio.php">
    <div class="bg-green text-black col-lg-5 col-md-8 col-sm-10 my-2">
    <img class="card-img oppa" src="./imagenes/5a1bbd3a243543.7868549015117673541483.png" alt="Card image">
    <div class="d-flex flex-column col-12 card-img-overlay justify-content-center my-3 align-items-center">
        <div class = "w-100 bg-black text-center rounded">
            <h3 class="font-weight-bold texto-borde ">Cálculo Alimento</h3>
        </div>
        <div class = "d-flex col-12 bg-black rounded">
        <p class="card-text font-weight-bold texto-borde ">Sensa o introduce el peso de tu animal, de esta manera
            se calculará el IMC (Índice de Masa Corporal) de tu mascota, además podrás saber cuanta comida
            darle según los rangos de peso de la tabla alimenticia de la comida que le estás dando.</p>
        </div>
    </div>
    </a>
    </div>
    <a href="#">
    <div class="bg-yellow text-black col-lg-5 col-md-8 col-sm-10 my-2">
    <img class="card-img oppa" src="./imagenes/5a1bbd3a243543.7868549015117673541483.png" alt="Card image">
    <div class="d-flex flex-column col-12 card-img-overlay justify-content-center my-3 align-items-center">
        <div class = "w-100 bg-black text-center rounded">   
        <h3 class="card-title font-weight-bold texto-borde">Monitoreo</h3>
    </div>    
        <div class = "d-flex col-12 bg-black rounded">
        <p class="card-text font-weight-bold texto-borde">Monitorea los datos que recopilan nuestros sensores. Aquí
            podrás saber el estado de tu comedero y la temperatura del agua de tu mascota, de esta 
            manera te aseguras de que nunca le falte alimento y su comida esté en buenas condiciones.</p>
        </div>
    </div>
    </a>
    </div>
</div>
<?php
    include_once("footer.php");
?>