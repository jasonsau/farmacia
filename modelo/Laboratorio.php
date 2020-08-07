<?php
include_once "Conexion.php";

class Laboratorio
{
    public function __construct()
    {
        $db = new Conexion();
        $this->con = $db->pdo;
    }

    //Verificca que el nombre del laboratorio par que no se repita
    public function verificarLaboratorio($nombre)
    {
        $sql = "SELECT nombre FROM laboratorio where nombre = :nombre";
        $query = $this->con->prepare($sql);
        $query->execute(array(':nombre' => $nombre));
        $objetos = $query->fetchall();
        if (!empty($objetos)) {
            return false;
        } else {
            return true;
        }
    }

    //Funcion para crear Laboratorio
    function CrearLaboratorio($nombre)
    {
        $avatar = "../img/nueva.png";
        $sql = "INSERT INTO laboratorio(nombre, avatar) VALUES(:nombre, :avatar)";
        $query = $this->con->prepare($sql);
        $crear = $query->execute(array(':nombre' => $nombre, ':avatar' => $avatar));
        if ($crear) {
            return true;
        } else {
            return false;
        }
    }

    //Busqueda de laboratorio dinamica
    function buscarLaboratorio($valor)
    {
        if (!empty($valor)) {
            $sql = "SELECT *FROM laboratorio WHERE nombre LIKE :nombre";
            $query = $this->con->prepare($sql);
            $query->execute(array(':nombre' => "%$valor%"));
            $objetos = $query->fetchall();
            return $objetos;
        } else {
            $sql = "SELECT *FROM laboratorio";
            $query = $this->con->prepare($sql);
            $query->execute();
            $objetos = $query->fetchall();
            return $objetos;
        }
    }
}
