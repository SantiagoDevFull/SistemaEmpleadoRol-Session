<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include '../include/recursosCSS.php' ?>
</head>

<body>
    <?php include '../include/recursosJS.php' ?>
    <script src="../js/rol.js"></script>
    <?php include '../include/navegacion.php' ?>

    <div class="container-fluid">
        <br>
        <h3><i class="fa-sharp fa-solid fa-square-check" style="color: #025af2;"></i> Rol de Usuarios</h3>
        <hr>

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">
            <i class="fa-solid fa-folder-plus fa-xl"></i> Nuevo Rol
        </button>

        <a target="_blank" href="../controller/ControlRol.php?accion=GenerarPDF" class="btn btn-danger"><i class="fa-solid fa-file-pdf fa-xl"></i> Generar reporte</a>
        <br><br>

        <table id="tabla" class="table table-striped text-center" style="width:100%">
            <thead class="bg-info">
                <tr>
                    <th class="col-2 text-center">CÓDIGO</th>
                    <th class="col-5 text-center">ROL</th>
                    <th class="col-2 text-center">#USUARIOS REG.</th>
                    <th class="col-3 text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listarRol as $rol) : ?>
                    <tr>
                        <td><?php echo $rol->getId(); ?></td>
                        <td><?php echo $rol->getNomRol(); ?></td>
                        <td><?php echo $rol->getNumUsuReg(); ?></td>
                        <td>
                            <button class="btn btn-warning" onclick="AbrirEditar(<?php echo $rol->getId(); ?>,'<?php echo $rol->getNomRol(); ?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                            <button class="btn btn-danger" onclick="AbrirEliminar(<?php echo $rol->getId(); ?>,'<?php echo $rol->getNomRol(); ?>',<?php echo $rol->getNumUsuReg(); ?>);"><i class="fa-solid fa-trash-can fa-xl"></i></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar -->
    <div class="modal fade" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControlRol.php" method="POST" onsubmit="return ValidarAgregar();">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">::: Nuevo Rol :::</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="form-label" for="">CÓDIGO <span style="color: red;">*</span></label>
                        <input class="form-control" type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $id ?>" readonly>

                        <label class="form-label" for="">ROL <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="txtNomRol" id="txtNomRol"><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" type="submit" name="accion" value="Agregar"><i class="fa-solid fa-folder-plus fa-xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar -->
    <div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControlRol.php" method="POST" onsubmit="return ValidarEditar();">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">::: Editar Rol :::</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="form-label" for="">CÓDIGO <span style="color: red;">*</span></label>
                        <input class="form-control" type="number" name="lblCodigo" id="lblCodigo" value="<?php echo $id ?>" readonly>

                        <label class="form-label" for="">ROL <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="lblNomRol" id="lblNomRol"><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-warning" type="submit" name="accion" value="Editar"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para Eliminar -->
    <div class="modal fade" id="modalEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControlRol.php" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">::: Eliminar Rol :::</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label class="form-label" for="">CÓDIGO <span style="color: red;">*</span></label>
                        <input class="form-control" type="number" name="codRol" id="codRol" readonly>

                        <label class="form-label" for="">ROL <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="nomRol" id="nomRol" readonly><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-danger" type="submit" name="accion" value="Eliminar"><i class="fa-solid fa-trash-can fa-xl"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_SESSION['error'])) {
    $mensaje = $_SESSION['error'];
    echo "<script>fnToast('error','" . $mensaje . "');</script>";
}

if (isset($_SESSION['success'])) {
    $mensaje = $_SESSION['success'];
    echo "<script>fnToast('success','" . $mensaje . "');</script>";
}
unset($_SESSION['error']);
unset($_SESSION['success']);
?>