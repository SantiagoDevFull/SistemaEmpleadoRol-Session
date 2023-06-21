<?php

require_once '../modelDAO/RolDAO.php';

$daoRol = new RolDAO();
$accion = $_REQUEST['accion'];

switch ($accion) {
    case "Listar":
        Listar($daoRol);
        break;
    case "Agregar":
        Agregar($daoRol);
        break;
    case "Editar":
        Editar($daoRol);
        break;
    case "Eliminar":
        Eliminar($daoRol);
        break;
}

function Listar($daoRol)
{
    $listarRol = $daoRol->ListarRol();
    $id = $daoRol->RetornarCodigoRol();
    include '../view/pagRol.php';
}

function Agregar($daoRol)
{
    session_start();
    $rol = $_POST['txtNomRol'];

    $obj = new Rol();
    $obj->setNomRol($rol);

    $res = $daoRol->AgregarRol($obj);

    if ($res == 1) {
        $_SESSION['success'] = "Rol agregado correctamente";
    } else {
        $_SESSION['error'] = "Rol no se pudo agregar";
    }
    header("Location: ControlRol.php?accion=Listar");
}

function Editar($daoRol)
{
    session_start();
    $id = $_POST['lblCodigo'];
    $rol = $_POST['lblNomRol'];

    $obj = new Rol();
    $obj->setId($id);
    $obj->setNomRol($rol);

    $res = $daoRol->EditarRol($obj);

    if ($res == 1) {
        $_SESSION['success'] = "Rol actualizado correctamente";
    } else {
        $_SESSION['error'] = "Rol no se pudo actualizar";
    }
    header("Location: ControlRol.php?accion=Listar");
}

function Eliminar($daoRol)
{

    session_start();
    $id = $_POST['codRol'];

    $res = $daoRol->EliminarRol($id);

    if ($res > 0) {
        $_SESSION['success'] = "Rol eliminado correctamente";
    } else {
        $_SESSION['success'] = "Rol no se pudo eliminar";
    }

    header("Location: ControlRol.php?accion=Listar");
}
