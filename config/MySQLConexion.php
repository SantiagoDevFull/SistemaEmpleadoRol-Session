<?php

function getConexion()
{
    $con = null;
    try {
        $host = "localhost";
        $database = "bdphpempresa";
        $username = "root";
        $password = "";

        $con = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexión exitosa";
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    return $con;
}
