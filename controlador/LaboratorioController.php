<?php

include_once "../modelo/Laboratorio.php";
$labo = new Laboratorio();

//Crear Laboratorio 
if ($_POST['funcion'] == "crearLaboratorio") {
    $nombre = $_POST['nombre'];
    if ($labo->verificarLaboratorio($nombre)) {
        $result = $labo->CrearLaboratorio($nombre);
        return print "Guardado";
    } else {
        return print "noGuardado";
    }
}

//Busqueda de laboratorio dinamica
if ($_POST['funcion'] == "buscarLaboratorio") {
    $json = array();
    $nombre = $_POST['valor'];
    $objetos = $labo->buscarLaboratorio($nombre);

    foreach ($objetos as $ob) {
        $json[] = array(
            'id' => $ob->id_laboratorio,
            'nombre' => $ob->nombre,
            'avatar' => $ob->avatar,
        );
    }
    $json_string = json_encode($json);
    echo $json_string;
}
