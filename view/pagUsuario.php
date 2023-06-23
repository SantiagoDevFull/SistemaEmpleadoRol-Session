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
    <script src="../js/usuario.js"></script>
    <?php require_once '../include/navegacionSoporte.php' ?>

    <br>
    <div class="container-fluid">
        <h3><i class="fa-sharp fa-solid fa-square-check" style="color: #025af2;"></i> Usuarios</h3>
        <hr>

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">
            <i class="fa-solid fa-folder-plus fa-xl"></i> Nuevo Usuario
        </button>

        <a target="_blank" href="../controller/ControlUsuario.php?accion=GenerarPDF" class="btn btn-danger"><i class="fa-solid fa-file-pdf fa-xl"></i> Generar reporte</a>
        <br><br>

        <table id="tabla" class="table table-striped text-center">
            <thead class="bg-info">
                <tr>
                    <th class="col-1 text-center">CÓDIGO</th>
                    <th class="col-2 text-center">CORREO</th>
                    <th class="col-2 text-center">CONTRASEÑA</th>
                    <th class="col-2 text-center">NOMBRE</th>
                    <th class="col-1 text-center">FECHA CONTRATO</th>
                    <th class="col-2 text-center">ROL</th>
                    <th class="col-2 text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listarUsuarios as $usu) : ?>
                    <tr>
                        <td><?php echo $usu->getIdUsu(); ?></td>
                        <td><?php echo $usu->getCorreoUsu(); ?></td>
                        <td><?php echo $usu->getPassUsu(); ?></td>
                        <td><?php echo $usu->getNomUsu(); ?></td>
                        <td><?php echo $usu->getFechContUsu(); ?></td>
                        <td><?php echo $usu->getRol()->getNomRol(); ?></td>
                        <td>
                            <button class="btn btn-warning" onclick="AbrirEditar(<?php echo $usu->getIdUsu(); ?>,'<?php echo $usu->getCorreoUsu(); ?>','<?php echo $usu->getPassUsu(); ?>','<?php echo $usu->getNomUsu(); ?>','<?php echo $usu->getFechContUsu(); ?>',<?php echo $usu->getRol()->getId(); ?>);">
                                <i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                            <button class="btn btn-danger" onclick="AbrirEliminar(<?php echo $usu->getIdUsu(); ?>,'<?php echo $usu->getNomUsu(); ?>')"><i class="fa-solid fa-trash-can fa-xl"></i></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <!-- Modal agregar -->
    <div class="modal fade" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControlUsuario.php" method="POST" onsubmit="return ValidarAgregar();">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">::: Nuevo Usuario :::</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="form-label" for="">CÓDIGO <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="txtCodigo" id="txtCodigo" value="<?php echo $id ?>" readonly>

                        <label class="form-label" for="">CORREO <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="txtCorreo" id="txtCorreo">

                        <label class="form-label" for="">CONTRASEÑA <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="txtPass" id="txtPass">

                        <label class="form-label" for="">NOMBRE <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="txtNombre" id="txtNombre">

                        <label class="form-label" for="">FECHA CONTRATO <span style="color: red;">*</span></label>
                        <input class="form-control" type="datetime-local" name="txtFecha" id="txtFecha">

                        <label class="form-label" for="">ROL <span style="color: red;">*</span></label>
                        <select class="form-select" name="txtRol" id="txtRol">
                            <option value="">::: Seleccionar :::</option>
                            <?php foreach ($listarRoles as $rol) : ?>
                                <option value="<?php echo $rol->getId(); ?>"><?php echo $rol->getNomRol(); ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="accion" value="Agregar"><i class="fa-solid fa-folder-plus fa-xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControlUsuario.php" method="POST" onsubmit="return ValidarEditar();">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">::: Editar Usuario :::</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="form-label" for="">CÓDIGO <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="lblCodigo" id="lblCodigo" readonly>

                        <label class="form-label" for="">CORREO <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="lblCorreo" id="lblCorreo">

                        <label class="form-label" for="">CONTRASEÑA <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="lblPass" id="lblPass">

                        <label class="form-label" for="">NOMBRE <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="lblNombre" id="lblNombre">

                        <label class="form-label" for="">FECHA CONTRATO <span style="color: red;">*</span></label>
                        <input class="form-control" type="datetime-local" name="lblFecha" id="lblFecha">

                        <label class="form-label" for="">ROL <span style="color: red;">*</span></label>
                        <select class="form-select" name="lblRol" id="lblRol">
                            <option value="">::: Seleccionar :::</option>
                            <?php foreach ($listarRoles as $rol) : ?>
                                <option value="<?php echo $rol->getId(); ?>"><?php echo $rol->getNomRol(); ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning" name="accion" value="Editar"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar -->
    <div class="modal fade" id="modalEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControlUsuario.php" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">::: Eliminar Usuario :::</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="form-label" for="">CÓDIGO <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="codUsu" id="codUsu" readonly>

                        <label class="form-label" for="">NOMBRE <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="nomUsu" id="nomUsu" readonly>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" name="accion" value="Eliminar"><i class="fa-solid fa-trash-can fa-xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_SESSION['success'])) {
    $mensaje = $_SESSION['success'];
    echo "<script>fnToast('success','" . $mensaje . "');</script>";
}

if (isset($_SESSION['error'])) {
    $mensaje = $_SESSION['error'];
    echo "<script>fnToast('error','" . $mensaje . "');</script>";
}

unset($_SESSION['success']);
unset($_SESSION['error']);

?>