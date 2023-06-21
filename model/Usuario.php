<?php

class Usuario
{

    private $idUsu;
    private $correoUsu;
    private $passUsu;
    private $nomUsu;
    private $fechContUsu;
    private $rol;

    public function __construct()
    {
    }

    public function getIdUsu()
    {
        return $this->idUsu;
    }

    public function setIdUsu($idUsu)
    {
        $this->idUsu = $idUsu;
    }

    public function getCorreoUsu()
    {
        return $this->correoUsu;
    }

    public function setCorreoUsu($correoUsu)
    {
        $this->correoUsu = $correoUsu;
    }

    public function getPassUsu()
    {
        return $this->passUsu;
    }

    public function setPassUsu($passUsu)
    {
        $this->passUsu = $passUsu;
    }

    public function getNomUsu()
    {
        return $this->nomUsu;
    }

    public function setNomUsu($nomUsu)
    {
        $this->nomUsu = $nomUsu;
    }

    public function getFechContUsu()
    {
        return $this->fechContUsu;
    }

    public function setFechContUsu($fechContUsu)
    {
        $this->fechContUsu = $fechContUsu;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
}
