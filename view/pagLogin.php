<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../include/recursosCSS.php' ?>
</head>

<body>
    <?php require_once '../include/recursosJS.php' ?>
    <script src="../js/funciones.js"></script>
    <script src="../js/index.js"></script>

    <a href="index.php" class="btn btn-dark col-12 top">Volver</a>
    <div class=" row align-items-center justify-content-center vh-100 mx-auto">

        <div class="container-fluid col-3 border rounded" style="padding: 0% 1% 1% 1%">
            <h1 class="">
                <center>Bienvenido</center>
            </h1>

            <div class="text-center mt-4">
                <img src="../image/sesion.jpg" class="img-fluid rounded-circle">
            </div>

            <form action="../controller/controlUsuario.php" method="POST" class="form mt-4" onsubmit="return ValidarCampos();">

                <label class="form-label" for=""><i class="fa-solid fa-envelope"></i> Correo <span style="color: red;">*</span></label>
                <input class="form-control" type="text" name="txtCorreo" id="txtCorreo" placeholder="Correo electrónico">

                <label class="form-label" for=""><i class="fa-solid fa-lock"></i> Contraseña <span style="color: red;">*</span></label>
                <input class="form-control" type="password" name="txtPass" id="txtPass" placeholder="Contraseña">

                <button class="btn btn-primary form-control mt-3 p-2" type="submit" name="accion" value="Login" style="font-size: 25px;">Iniciar Sesión</button>
            </form>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];

    echo "<script>fnToast('error','" . $mensaje . "')</script>";
    unset($_SESSION['mensaje']);
}
?>