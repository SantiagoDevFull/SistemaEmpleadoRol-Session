<?php
require_once '../interfaces/Iusuario.php';
require_once '../model/Usuario.php';
require_once '../config/MySQLConexion.php';

class UsuarioDAO implements Iusuario
{
    private $cn = null;
    private $st = null;
    private $rs = null;

    public function Login($correo, $pass)
    {

        $obj = null;
        $cn = getConexion();
        $consulta = "SELECT u.idUsu,u.correoUsu,u.passUsu,u.nomUsu,u.fechContUsu,r.idRol,r.nomRol FROM usuario u
        INNER JOIN rol r ON (u.idRol=r.idRol)
        WHERE u.correoUsu=? AND u.passUsu=?;";

        try {

            $st = $cn->prepare($consulta);
            $st->bindParam(1, $correo);
            $st->bindParam(2, $pass);
            $st->execute();

            $obj = $st->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $obj;
    }

    public function ListarUsuario()
    {

        $lista = array();
        $cn = getConexion();
        $consulta = "SELECT u.idUsu,u.correoUsu,u.passUsu,u.nomUsu,u.fechContUsu,r.idRol,r.nomRol FROM usuario u
        INNER JOIN rol r on(u.idRol=r.idRol) order by 1";

        try {
            $st = $cn->prepare($consulta);
            $st->execute();
            while ($rs = $st->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario();
                $usuario->setIdUsu($rs['idUsu']);
                $usuario->setCorreoUsu($rs['correoUsu']);
                $usuario->setPassUsu($rs['passUsu']);
                $usuario->setNomUsu($rs['nomUsu']);
                $usuario->setFechContUsu($rs['fechContUsu']);

                $rol = new Rol();
                $rol->setId($rs['idRol']);
                $rol->setNomRol($rs['nomRol']);

                $usuario->setRol($rol);
                $lista[] = $usuario;
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        } finally {
            $cn = null;
            $st = null;
            $rs = null;
        }
        return $lista;
    }

    public function RetornarCodigoUsuario()
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "SELECT AUTO_INCREMENT
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'bdphpempresa'
        AND   TABLE_NAME   = 'usuario';";

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

    public function AgregarUsuario($usuario)
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "INSERT INTO usuario(correoUsu,passUsu,nomUsu,fechContUsu,idRol) VALUES (?,?,?,?,?);";

        try {
            $st = $cn->prepare($consulta);
            $st->bindParam(1, $usuario->getCorreoUsu());
            $st->bindParam(2, $usuario->getPassUsu());
            $st->bindParam(3, $usuario->getNomUsu());
            $st->bindParam(4, $usuario->getFechContUsu());
            $st->bindParam(5, $usuario->getRol()->getId());
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

    public function EditarUsuario($usuario)
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "UPDATE usuario SET correoUsu=?,passUsu=?,nomUsu=?,fechContUsu=?,idRol=? WHERE idUsu=?;";

        try {
            $st = $cn->prepare($consulta);
            $st->bindParam(1, $usuario->getCorreoUsu());
            $st->bindParam(2, $usuario->getPassUsu());
            $st->bindParam(3, $usuario->getNomUsu());
            $st->bindParam(4, $usuario->getFechContUsu());
            $st->bindParam(5, $usuario->getRol()->getId());
            $st->bindParam(6, $usuario->getIdUsu());
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

    public function EliminarUsuario($idUsu)
    {

        $res = 0;
        $cn = getConexion();
        $consulta = "DELETE FROM usuario WHERE idUsu=?";

        try {
            $st = $cn->prepare($consulta);
            $st->bindParam(1, $idUsu);
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
