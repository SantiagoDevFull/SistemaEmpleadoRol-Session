<?php
require_once '../interfaces/Irol.php';
require_once '../config/MySQLConexion.php';
require_once '../model/Rol.php';
class RolDAO implements Irol
{

    private $cn = null;
    private $st = null;
    private $rs = null;

    public function ListarRol()
    {
        $lista = array();
        $cn = getConexion();
        $consulta = "SELECT *,(select count(*) from usuario u where u.idRol=r.idRol) as cantidad
        FROM rol r
        order by 1";

        try {
            $st = $cn->prepare($consulta);
            $st->execute();

            while ($rs = $st->fetch(PDO::FETCH_ASSOC)) {
                $rol = new Rol();
                $rol->setId($rs['idRol']);
                $rol->setNomRol($rs['nomRol']);
                $rol->setNumUsuReg($rs['cantidad']);
                $lista[] = $rol;
            }
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $lista;
    }
    public function RetornarCodigoRol()
    {
        $res = 0;
        $cn = getConexion();
        $consulta = "SELECT AUTO_INCREMENT
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'bdphpempresa'
        AND   TABLE_NAME   = 'rol';";

        try {

            $st = $cn->prepare($consulta);
            $st->execute();
            if ($rs = $st->fetch(PDO::FETCH_ASSOC)) {
                $res = $rs['AUTO_INCREMENT'];
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $res;
    }

    public function AgregarRol($rol)
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "INSERT INTO rol(nomRol) VALUES (?)";

        try {

            $st = $cn->prepare($consulta);
            $st->bindParam(1, $rol->getNomRol());
            $res = $st->execute();
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $res;
    }

    public function EditarRol($rol)
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "UPDATE rol SET nomRol=? WHERE idRol=?";

        try {

            $st = $cn->prepare($consulta);
            $st->bindParam(1, $rol->getNomRol());
            $st->bindParam(2, $rol->getId());
            $res = $st->execute();
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $res;
    }

    public function EliminarRol($id)
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "DELETE FROM rol WHERE idRol=?";

        try {
            $st = $cn->prepare($consulta);
            $st->bindParam(1, $id);
            $res = $st->execute();
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $res;
    }
}
