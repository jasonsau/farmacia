<?php

include_once 'Conexion.php';

class Usuario
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function Loguearse($dni, $pass)
    {
        $sql = "SELECT *FROM usuario u inner join tipo_us t on u.us_tipo=t.id_tipo_us where u.dni_us=:dni and u.contrasena_us=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni, ':pass'=>$pass));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    function obtener_usuario($dato)
    {
        $sql = "SELECT *FROM usuario u inner join tipo_us t on u.us_tipo = t.id_tipo_us and u.id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$dato));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    } 

    function actulizar_datos($id_usuario, $residencia, $sexo, $correo, $telefono, $adicional)
    {
        $sql = "UPDATE usuario SET residencia_us=:residencia,  sexo_us=:sexo,  correo_us=:correo, telefono_us=:telefono, adicional_us=:adicional WHERE id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':residencia'=>$residencia, ':sexo'=>$sexo, ':correo'=>$correo, ':telefono'=>$telefono, ':adicional'=>$adicional, ':id'=>$id_usuario));
    }

    function comprobarPass($idUsuario, $oldPass)
    {
        $sql = "SELECT *from usuario where id_usuario=:idUsuario and contrasena_us=:oldPass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':idUsuario'=>$idUsuario, ':oldPass'=>$oldPass));
        $this->objetos = $query->fetchall();
         if(!empty($this->objetos))
        {
            return true;
        }
        else
        {
            false;
        } 
    }

    function actualizarPass($idUsuario, $newPass)
    {
        $sql = "UPDATE usuario SET contrasena_us=:newPass WHERE id_usuario =:idUsuario";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':newPass'=>$newPass, ':idUsuario'=>$idUsuario));
    }

    function buscarAvatar($idUsuario)
    {
        $sql ="SELECT avatar FROM usuario where id_usuario=:idUsuario";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':idUsuario'=>$idUsuario));
        $this->objetos = $query->fetchall();
    }

    function cambiarAvatar($nombre, $idUsuario)
    {
        $sql = "UPDATE usuario SET avatar=:nombre where id_usuario=:idUsuario";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre, ':idUsuario'=>$idUsuario));
    }

    function buscar()
    {
        if(!empty($_POST['valor']))
        {
            $consula = $_POST['valor'];
            $sql = "SELECT *FROM usuario u  join tipo_us t on u.us_tipo = t.id_tipo_us where nombre_us LIKE :valor";
            $query=$this->acceso->prepare($sql);
            $query->execute(array(':valor'=>"%$consula%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else
        {
            $sql = "SELECT *FROM usuario u join tipo_us t on u.us_tipo = t.id_tipo_us ORDER BY id_usuario LIMIT 25";
            $query=$this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
} 
 ?>