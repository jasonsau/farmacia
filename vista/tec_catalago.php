<?php

session_start();
if($_SESSION['us_tipo']==3)
{
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Tecnico</title>
        </head>
        <body>
            <h1>Bienvenido Tecnico</h1>
            <a href = "../controlador/Logout.php"> Cerrar Session</a>
        </body>
    </html>
<?php
}
else
{
    header('Location: ../index.php');
}
?>