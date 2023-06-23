<?php

require_once '../model/Rol.php';
require_once '../modelDAO/UsuarioDAO.php';
require_once '../modelDAO/RolDAO.php';

$daoUsuario = new UsuarioDAO();
$daoRol = new RolDAO();

$accion = $_REQUEST['accion'];

switch ($accion) {
    case "Login":
        Login($daoUsuario);
        break;
    case "CerrarSesion":
        CerrarSesion($daoUsuario);
        break;
    case "Listar":
        Listar($daoUsuario, $daoRol);
        break;
    case "Agregar":
        Agregar($daoUsuario);
        break;
    case "Editar":
        Editar($daoUsuario);
        break;
    case "Eliminar":
        Eliminar($daoUsuario);
        break;
    case "GenerarPDF":
        GenerarPDF();
        break;
}

function Login($daoUsuario)
{
    session_start();
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];

    $row = $daoUsuario->Login($correo, $pass);

    if ($row != null) {
        $usu = new Usuario();
        $usu->setIdUsu($row['idUsu']);
        $usu->setCorreoUsu($row['correoUsu']);
        $usu->setPassUsu($row['passUsu']);
        $usu->setNomUsu($row['nomUsu']);
        $usu->setFechContUsu($row['fechContUsu']);

        $rol = new Rol();
        $rol->setId($row['idRol']);
        $rol->setNomRol($row['nomRol']);

        $usu->setRol($rol);

        $_SESSION['usuario'] = $usu;
        header("Location: ../view/pagSoporte.php");
    } else {
        $_SESSION['mensaje'] = "Correo y/o contraseña incorrecto";
        header("Location: ../view/pagLogin.php");
    }
}

function CerrarSesion($daoUsuario)
{
    session_start();
    session_destroy();
    header("Location: ../view/pagLogin.php");
}

function Listar($daoUsuario, $daoRol)
{

    $listarUsuarios = $daoUsuario->ListarUsuario();
    $listarRoles = $daoRol->ListarRol();
    $id = $daoUsuario->RetornarCodigoUsuario();
    require_once '../view/pagUsuario.php';
}

function Agregar($daoUsuario)
{

    session_start();
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];
    $nombre = $_POST['txtNombre'];
    $fecha = $_POST['txtFecha'];
    $idRol = $_POST['txtRol'];

    $usu = new Usuario();
    $usu->setCorreoUsu($correo);
    $usu->setPassUsu($pass);
    $usu->setNomUsu($nombre);
    $usu->setFechContUsu($fecha);

    $rol = new Rol();
    $rol->setId($idRol);

    $usu->setRol($rol);

    $res = $daoUsuario->AgregarUsuario($usu);

    if ($res > 0) {
        $_SESSION['success'] = "Usuario agregado correctamente";
    } else {
        $_SESSION['error'] = "Usuario no se pudo agregar";
    }

    header("Location: ControlUsuario.php?accion=Listar");
}

function Editar($daoUsuario)
{

    session_start();
    $idUsu = $_POST['lblCodigo'];
    $correo = $_POST['lblCorreo'];
    $pass = $_POST['lblPass'];
    $nombre = $_POST['lblNombre'];
    $fecha = $_POST['lblFecha'];
    $idRol = $_POST['lblRol'];

    $usu = new Usuario();
    $usu->setIdUsu($idUsu);
    $usu->setCorreoUsu($correo);
    $usu->setPassUsu($pass);
    $usu->setNomUsu($nombre);
    $usu->setFechContUsu($fecha);

    $rol = new Rol();
    $rol->setId($idRol);

    $usu->setRol($rol);

    $res = $daoUsuario->EditarUsuario($usu);

    if ($res > 0) {
        $_SESSION['success'] = "Usuario actualizado correctamente";
    } else {
        $_SESSION['error'] = "Usuario no se pudo actualizar";
    }

    header("Location: ControlUsuario.php?accion=Listar");
}

function Eliminar($daoUsuario)
{
    session_start();
    $idUsu = $_POST['codUsu'];

    $res = $daoUsuario->EliminarUsuario($idUsu);

    if ($res > 0) {
        $_SESSION['success'] = "Usuario eliminado correctamente";
    } else {
        $_SESSION['error'] = "Usuario no se pudo eliminar";
    }

    header("Location: ControlUsuario.php?accion=Listar");
}

function GenerarPDF()
{
    header("Location: ../Report/ReporteUsuario.php");
}
