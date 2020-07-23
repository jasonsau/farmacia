<?php

include_once '../modelo/Usuario.php';

$usuario = new Usuario();
if($_POST['funcion']=='buscar_usuario')
{
    $json = array();
    $usuario->obtener_datos($_POST['dato']);
    foreach($usuario->objetos as $objeto)
    {
        $json[]=array(
            'nombre'=>$objeto.nombre_us,
            'apellido'=>$objeto.apellidos_us,
            'edad'=>$objeto.edad,
            'dni'=>$objeto.dni_us,
            'tipo'=>$objeto.nombre_tipo,
            'telefono'=>$objeto.telefono_us,
            'residencia'=>$objeto.residencia_us,
            'correro'=>$objeto.correo_us,
            'sexo'=>$objeto.sexo_us,
            'adicional'=>$objeto.adicional_us
        );
    }
    $json_string = json_encode($json[0]);
    echo $json_string;
}

?>