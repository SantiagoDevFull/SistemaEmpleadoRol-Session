<?php

require_once '../model/Usuario.php';
require_once '../model/Rol.php';

session_start();

$usu = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
    header("Location: ../view/pagLogin.php");
}

?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand"><i class="fa-solid fa-user"></i> <?php echo $usu->getNomUsu() . ' | ' . $usu->getRol()->getNomRol(); ?></a>
        <div class="offcanvas offcanvas-start text-bg-warning" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><i class="fa-solid fa-house"></i> Bienvenido</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="text-center">
                <i class="fa-solid fa-user" style="font-size: 8em;"></i>
            </div>
            <div class="text-center">
                <?php echo $usu->getNomUsu() . '<br>' . $usu->getRol()->getNomRol(); ?>
            </div>
            <div class="text-center">
                <form action="../controller/ControlUsuario.php" method="GET">
                    <button class="btn btn-danger" type="submit" name="accion" value="CerrarSesion">Cerrar Sesión</button>
                </form>
            </div>
            <hr>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="../controller/ControlRol.php?accion=Listar"><i class="fa-sharp fa-solid fa-square-check" style="color: #0212f2;"></i> Rol de Usuarios</a>
                        <a class="nav-link text-dark" href="../controller/ControlUsuario.php?accion=Listar"><i class="fa-sharp fa-solid fa-square-check" style="color: #0212f2;"></i> Usuarios</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>