<?php

session_start();
if ($_SESSION['us_tipo'] == 4 || $_SESSION['us_tipo'] == 2) {
    include_once 'layouts/header.php';
?>

    <title>Adm | Atributo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <?php
    include_once 'layouts/nav.php';
    ?>

    <!-- Inicio Cambiar el avatar del laboratorio !-->
    <div class="modal fade" id="cambiarAvatarLaboratorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Avatar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img id="avatar-img1" src="../img/avatar04.png" class="profile-user-img img-fluid img-circle">
                    </div>
                    <div class="text-center">
                        <div class="alert alert-success text-center" id="avatar-span" style='display:none;'>
                            <span>
                                <i class="fas fa-check"></i>
                                Se ha cambiado el Avatar
                            </span>
                        </div>
                        <div class="alert alert-danger text-center m-1" id="noavatar-span" style="display:none;">
                            <span>
                                <i class="fas fa-times m-1">
                                </i>
                                No se ha cambiado el Avatar
                            </span>
                        </div>
                        <form id="formAvatarLaboratorio" enctype="multipart/form-data">
                            <div class="input-group mb-3 ml-5 mt-2">
                                <input class="input-group" name="avatar" type="file">
                                <input type="hidden" name="funcion" value="cambiar-avatar">
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Cambiar el avatar del laboratorio !-->

    <!--  Comienza el modal de crear laboratorio !-->
    <div class="modal fade" id="crearLaboratorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="alert alert-success text-center" id="alertCrear" style='display:none;'>
                        <span>
                            <i class="fas fa-check"></i>
                            Se ha guardado con exito
                        </span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="alertSinCrear" style="display:none;">
                        <span>
                            <i class="fas fa-times m-1">
                            </i>
                            No se ha guardado
                        </span>
                    </div>

                    <div class="card-header">
                        <h3 class="card-title">Crear Laboratorio</h3>
                        <button class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form class="" id="formCrearLaboratorio">
                            <div class="form-group">
                                <label for="nombreLaboratorio">
                                    Nombre
                                </label>
                                <input id="nombreLaboratorio" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button id="buttonCrearLaboratorio" type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Final del modal crear Laboratorio -->


    <!--  Comienza el modal de crear Tipo !-->
    <div class="modal fade" id="crearTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="alert alert-success text-center" id="guardar" style='display:none;'>
                        <span>
                            <i class="fas fa-check"></i>
                            Se ha guardado con exito
                        </span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="sin_guardar" style="display:none;">
                        <span>
                            <i class="fas fa-times m-1">
                            </i>
                            No se ha guardado
                        </span>
                    </div>

                    <div class="card-header">
                        <h3 class="card-title">Crear Tipo</h3>
                        <button class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form class="" id="formCrearTipo">
                            <div class="form-group">
                                <label for="nombreTipo">
                                    Nombre
                                </label>
                                <input id="nombreTipo" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button id="buttonCrearTipo" type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Final del modal Tipo --!>


    <!--  Comienza el modal de crear Presentacion !-->
    <div class="modal fade" id="crearPresentacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="alert alert-success text-center" id="guardar" style='display:none;'>
                        <span>
                            <i class="fas fa-check"></i>
                            Se ha guardado con exito
                        </span>
                    </div>
                    <div class="alert alert-danger text-center m-1" id="sin_guardar" style="display:none;">
                        <span>
                            <i class="fas fa-times m-1">
                            </i>
                            No se ha guardado
                        </span>
                    </div>

                    <div class="card-header">
                        <h3 class="card-title">Crear Presentacion</h3>
                        <button class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form class="" id="formCrearPresentacion">
                            <div class="form-group">
                                <label for="nombreTipo">
                                    Nombre
                                </label>
                                <input id="nombrePresentacion" type="text" class="form-control" placeholder="Ingrese nombre" required>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button id="buttonCrearPresentacion" type="submit" class="btn bg-gradient-primary float-right m-1">Crear</button>
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Final del modal Presentacion--!>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestion Atributos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gestion Atributos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#laboratorio" data-toggle="tab">Laboratorio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tipo" data-toggle="tab">Tipo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#presentacion" data-toggle="tab">Presentacion</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="laboratorio">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Busca Laboratoio
                                                    <button type="button" data-toggle="modal" data-target="#crearLaboratorio" class="btn bg-gradient-primary btn-sm m-2">
                                                        Crear Laboratorio
                                                    </button>
                                                </div>
                                                <div class="input-group">
                                                    <input id="idLaboratorio" type="text" class="form-control float-left" placeholder="Ingrese el nombre">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <table class="table table-over text-nowrap">
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>Laboratorio</th>
                                                            <th>Logo</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-active" id="laboratorios">

                                                    </tbody>

                                                </table>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tipo">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Busca Tipo
                                                    <button class="btn bg-gradient-primary btn-sm m-2" data-toggle="modal" data-target="#crearTipo">
                                                        Crear Tipo
                                                    </button>

                                                </div>
                                                <div class="input-group">
                                                    <input id="idTipo" type="text" class="form-control float-left" placeholder="Ingrese el nombre">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="presentacion">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Busca Presentacion
                                                    <button class="btn bg-gradient-primary btn-sm m-2" data-toggle="modal" data-target="#crearPresentacion">
                                                        Crear Presentacion
                                                    </button>

                                                </div>
                                                <div class="input-group">
                                                    <input id="idPresentacion" type="text" class="form-control float-left" placeholder="Ingrese el nombre">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php
    include_once 'layouts/footer.php';
} else {
    header('Location: ../index.php');
}
?>
<script src="../js/GestionLaboratorio.js"></script>
