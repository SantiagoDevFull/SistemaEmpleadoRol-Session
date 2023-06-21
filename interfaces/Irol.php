<?php

interface Irol
{

    public function ListarRol();
    public function RetornarCodigoRol();
    public function AgregarRol($rol);
    public function EditarRol($rol);
    public function EliminarRol($id);
}
