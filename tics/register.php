<?php
    include_once("header.php");
 ?>
 <div class = "d-flex flex-column justify-content-center align-items-center col-12 pd-top2 ">
    <div class = "d-flex flex-column justify-content-center align-items-center bg-beige col-md-6 col-sm-12 rounded">
        <h2 class="pd-10 font-weight-bold text-uppercase">Registrate</h2>
        <form action="./back/redRegister.php" method="POST">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                <div class="form-outline">
                    <input type="text" id="nombre" class="form-control" placeholder="Allan" name="nombre" required/>
                    <label class="form-label" for="nombre">Nombre</label>
                </div>
                </div>
                <div class="col">
                <div class="form-outline">
                    <input type="text" id="apellido" class="form-control" placeholder="Walker" name="apellido" required/>
                    <label class="form-label" for="apellido">Apellido</label>
                </div>
                </div>
            </div>
                <div class="form-outline mb-4">
                    <input type="text" id="rut" class="form-control" placeholder="19844639-4" name="rut" required/>
                    <label class="form-label" for="rut">Rut</label>
                </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="correo" class="form-control" placeholder="patas@gmail.com" name="correo" required/>
                <label class="form-label" for="correo">Correo electrónico</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" placeholder="12sdsd34" name="pass" required   />
                <label class="form-label" for="pass" >Contraseña</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Registrate</button>
        </form>
        <p>¿Tienes una cuenta? Entonces <a class="font-weight-bold" href="ingresa.php">Ingresa</a>.</p>
    </div>

 </div>
 <?php
    include_once("footer.php");
  ?>  