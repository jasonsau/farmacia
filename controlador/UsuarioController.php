<?php

include_once '../modelo/Usuario.php';

$usuario = new Usuario();
if($_POST['funcion']=='buscar_usuario')
{
    $json = array();
    $usuario->obtener_usuario($_POST['dato']);
    foreach($usuario->objetos as $objeto)
    {
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellido'=>$objeto->apellidos_us,
            'edad'=>$objeto->edad,
            'dni'=>$objeto->dni_us,
            'tipo'=>$objeto->nombre_tipo,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $json_string = json_encode($json[0]);
    echo $json_string;
}
if($_POST['funcion']=='capturar_datos')
{
    $json = array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->obtener_usuario($id_usuario);
    foreach($usuario->objetos as $objeto)
    {
        $json[]=array(
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $json_string = json_encode($json[0]);
    echo $json_string;
}
if($_POST['funcion']=='actualizar_datos')
{
    $id_usuario = $_POST['id_usuario'];
    $residencia = $_POST['residencia'];
    $sexo = $_POST['sexo'];
    $correo =$_POST['correo'];
    $telefono = $_POST['telefono'];
    $adicional = $_POST['adicional'];
    $usuario->actulizar_datos($id_usuario, $residencia, $sexo, $correo, $telefono, $adicional);
    echo 'editado';
}
?> 