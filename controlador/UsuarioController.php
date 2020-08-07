<?php

include_once '../modelo/Usuario.php';
session_start();
$idUsuario = $_SESSION['usuario'];
$usuario = new Usuario();
//Funcion para buscar un usuario

if ($_POST['funcion'] == 'buscar_usuario') {
    $json = array();
    $fechaActual = new DateTime();
    $usuario->obtener_usuario($_POST['dato']);
    foreach ($usuario->objetos as $objeto) {
        $nacimiento = new DateTime($objeto->edad);
        $edad = $nacimiento->diff($fechaActual);
        $edad_years = $edad->y;
        $json[] = array(
            'nombre' => $objeto->nombre_us,
            'apellido' => $objeto->apellidos_us,
            'edad' => $edad_years,
            'dni' => $objeto->dni_us,
            'tipo' => $objeto->nombre_tipo,
            'telefono' => $objeto->telefono_us,
            'residencia' => $objeto->residencia_us,
            'correo' => $objeto->correo_us,
            'sexo' => $objeto->sexo_us,
            'adicional' => $objeto->adicional_us,
            'avatar' => $objeto->avatar,
        );
    }

    $json_string = json_encode($json[0]);
    echo $json_string;
}

if ($_POST['funcion'] == 'capturar_datos') {
    $json = array();
    $id_usuario = $_POST['id_usuario'];
    $usuario->obtener_usuario($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[] = array(
            'telefono' => $objeto->telefono_us,
            'residencia' => $objeto->residencia_us,
            'correo' => $objeto->correo_us,
            'sexo' => $objeto->sexo_us,
            'adicional' => $objeto->adicional_us
        );
    }
    $json_string = json_encode($json[0]);
    echo $json_string;
}
if ($_POST['funcion'] == 'actualizar_datos') {
    $id_usuario = $_POST['id_usuario'];
    $residencia = $_POST['residencia'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $adicional = $_POST['adicional'];
    $usuario->actulizar_datos($id_usuario, $residencia, $sexo, $correo, $telefono, $adicional);
    echo 'editado';
}
//Funcion para cambiar la contraseña del usuario
if ($_POST['funcion'] == 'cambiarPass') {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $idUsuario = $_POST['id_usuario'];
    $prueba = $usuario->comprobarPass($idUsuario, $oldPass);

    if ($prueba) {
        $usuario->actualizarPass($idUsuario, $newPass);
        $cadena = "update";
        return print $cadena;
    } else {
        $cadena = "noUpdate";
        return print $cadena;
    }
}
//Funcion para cambiar el avatar del usuario
if ($_POST['funcion'] == "cambiar-avatar") {
    if (($_FILES['avatar']['type'] == 'image/jpeg') || ($_FILES['avatar']['type'] == 'image/png')) {
        $nombre = uniqid() . '' . $_FILES['avatar']['name'];
        $ruta = '../img/' . $nombre;
        $pr = move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta);
        $usuario->buscarAvatar($idUsuario);
        $usuario->cambiarAvatar($ruta, $idUsuario);

        foreach ($usuario->objetos as $objeto) {
            unlink('../img/' . $objeto->avatar);
        }
        $json = array();
        $json[] = array(
            'ruta' => $ruta,
            'alert' => 'edit',
        );
        $jsonstring = json_encode($json[0]);
        return print $jsonstring;
    } else {
        $json = array();
        $jason[] = array(
            'alert' => 'noedit'
        );
        $jsonstring = json_encode($jason[0]);
        return print $jsonstring;
    }
}

//Funcion para buscar los datos de forma dinamica mediante el buscador
if ($_POST['funcion'] == 'buscarDatos') {
    $json = array();
    $fechaActual = new DateTime();
    $usuario->buscar();
    foreach ($usuario->objetos as $objeto) {
        $nacimiento = new DateTime($objeto->edad);
        $edad = $nacimiento->diff($fechaActual);
        $edad_years = $edad->y;
        $json[] = array(
            'idUsuario' => $objeto->id_usuario,
            'nombre' => $objeto->nombre_us,
            'apellido' => $objeto->apellidos_us,
            'edad' => $edad_years,
            'dni' => $objeto->dni_us,
            'tipo' => $objeto->nombre_tipo,
            'telefono' => $objeto->telefono_us,
            'residencia' => $objeto->residencia_us,
            'correo' => $objeto->correo_us,
            'sexo' => $objeto->sexo_us,
            'adicional' => $objeto->adicional_us,
            'avatar' => $objeto->avatar,
            'tipoUsuario' => $objeto->us_tipo
        );
    }
    $json_string = json_encode($json);
    return print $json_string;
}

//Funcion para crear un nuevo usuario
if ($_POST['funcion'] == 'crearUsuario') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $password = $_POST['password'];
    $edad = $_POST['fecha'];
    $tipo = 3;
    $avatar = '../img/logo.png';
    $objeto = $usuario->comprobarDni($dni);

    if (empty($objeto)) {
        $usuario->crearUsuario($nombre, $apellido, $dni, $password, $edad, $tipo, $avatar);
        return print "guardado";
    } else {
        return print "noGuardado";
    }
}
//Funcion para ascender el usuario
if ($_POST['funcion'] == 'ascender') {
    $pass = $_POST['pass'];
    $id = $_POST['id_usuario'];
    $tipoAs = $_POST['tipoAs'];
    $resul = $usuario->comprobarPass($idUsuario, $pass);
    if ($resul) {
        $usuario->ascenderODescenderUsuario($id, $tipoAs);
        return print "hecho";
    } else {
        return print "nohecho";
    }
}

//Funcion para descender al usuario
if ($_POST['funcion'] == 'descender') {
    $tipoDes = $_POST['tipoDes'];
    $pass = $_POST['pass'];
    $id = $_POST['id_usuario'];

    $resul = $usuario->comprobarPass($idUsuario, $pass);
    if ($resul) {
        $usuario->ascenderODescenderUsuario($id, $tipoDes);

        return print "hecho";
    } else {
        return print "nohecho";
    }
}

//Funcion para eliminar el usuario
if ($_POST['funcion'] == 'eliminar') {
    $id = $_POST['id_usuario'];
    $pass = $_POST['pass'];
    $resul = $usuario->comprobarPass($idUsuario, $pass);
    if ($resul) {
        $usuario->eliminarUsuario($id);
        return print "eliminado";
    } else {
        return print $id;
    }
}
