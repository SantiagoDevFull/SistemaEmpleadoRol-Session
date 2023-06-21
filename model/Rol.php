<?php

class Rol
{

    private $idRol;
    private $nomRol;
    private $numUsuReg;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->idRol;
    }

    public function setId($id)
    {
        $this->idRol = $id;
    }

    public function getNomRol()
    {
        return $this->nomRol;
    }

    public function setNomRol($nomRol)
    {
        $this->nomRol = $nomRol;
    }

    public function getNumUsuReg()
    {
        return $this->numUsuReg;
    }

    public function setNumUsuReg($numUsuReg)
    {
        $this->numUsuReg = $numUsuReg;
    }
}
