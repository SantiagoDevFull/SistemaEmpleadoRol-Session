<?php

interface Iusuario
{

    public function Login($correo, $pass);
    public function ListarUsuario();
    public function RetornarCodigoUsuario();
    public function AgregarUsuario($usuario);
    public function EditarUsuario($usuario);
    public function EliminarUsuario($idUsu);
}
