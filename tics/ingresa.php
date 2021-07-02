<?php
    include_once("header.php");
?>
<div class = "d-flex flex-column justify-content-center align-items-center col-12 pd-top2">
    <div class = "d-flex flex-column justify-content-center align-items-center bg-beige col-md-6 col-sm-12 rounded">
    <h2 class="pd-10 font-weight-bold text-uppercase">Ingresa</h2>
    <form action="./back/redLogin.php?key=login" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="correo" class="form-control" placeholder="patas@gmail.com" name="correo"/>
                <label class="form-label" for="correo">Correo electrónico</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" class="form-control" placeholder="12sdsd34" name="pass" />
                <label class="form-label" for="pass">Contraseña</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Ingresa</button>
        </form>
        <p>¿No tienes una cuenta? Entonces <a class="font-weight-bold" href="register.php">Registrate</a>.</p>
    </div>
</div>
<?php
    include_once("footer.php");
?>