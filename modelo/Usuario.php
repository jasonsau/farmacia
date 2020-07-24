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

} 
 ?>