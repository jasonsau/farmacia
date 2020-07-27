<?php

include_once '../modelo/Usuario.php';

    session_start();

    if(!empty($_SESSION['us_tipo']))
    {
        switch($_SESSION['us_tipo'])
        {
            case 2:
                header('Location: ../vista/adm_catalago.php');
            break;
            case 3:
                header('Location: ../vista/adm_catalago.php');
            break;
            case 4: 
                header('Location: ../vista/adm_catalago.php');
            break;
        }
    }
    else
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    
        $usuario = new Usuario();
        $usuario->Loguearse($user, $pass);
        if(!empty($usuario->objetos))
        {
            foreach($usuario->objetos as $objeto)
            {
                $_SESSION['usuario']=$objeto->id_usuario;
                $_SESSION['us_tipo']=$objeto->us_tipo;
                $_SESSION['nombre_us']=$objeto->nombre_us;
            }
            switch($_SESSION['us_tipo'])
            {
                case 2:
                    header('Location: ../vista/adm_catalago.php');
                break;
                case 3:
                    header('Location: ../vista/adm_catalago.php');
                break;
                case 4:
                    header('Location: ../vista/adm_catalago.php');
                break;
            }
        }
        else
        {
            header('Location: ../index.php');
        }
    }


?>
