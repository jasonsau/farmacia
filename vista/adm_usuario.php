<?php
session_start();
if($_SESSION['us_tipo']==4 || $_SESSION['us_tipo']==2 || $_SESSION['us_tipo']==3)
{
    include_once 'layouts/header.php';
?>
<title>Adm | Usuario</title>
<?php
include_once 'layouts/nav.php'
?>

<!-- Inicio del modal de crearUsuario -->
<div class="modal fade" id="crear-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class ="card card-success">
              <div class = "card-header">
                  <h3 class = "card-title">Crear usuario</h3>
                  <button class ="close" data-dismiss = "modal" aria-label = "close">
                      <span aria-hidden="true">
                          &times;
                      </span>
                  </button>
              </div>
              <div class = "card-body">
                  <form class = "" id ="form-crear-usuario">
                      <div class = "form-group">
                          <label>
                              Nombres
                          </label>
                          <input id = "nombre" type = "text" class = "form-control" placeholder = "Ingrese nombre" required>
                      </div>
                      <div class = "form-group">
                          <label>
                              Apellidos
                          </label>
                          <input id = "apellidos" type = "text" class = "form-control" placeholder = "Ingrese apellidos" required>
                      </div>
                      <div class = "form-group">
                          <label>
                              Fecha de Nacimiento
                          </label>
                          <input id = "fecha" type = "date" class = "form-control" placeholder = "Ingrese Fecha de Nacimiento" required>
                      </div>
                      <div class = "form-group">
                          <label>
                              DNI
                          </label>
                          <input id = "dni" type = "text" class = "form-control" placeholder = "Ingrese su dni" required>
                      </div>
                      <div class = "form-group">
                          <label>
                              Password
                          </label>
                          <input id = "password" type = "pass" class = "form-control" placeholder = "Ingrese su password" required>
                      </div>
                      <div class = "form-group">
                        <label style ="display: block;">
                            Sexo
                        </label>
                        <div style ="display: block;">
                            <input id = "masculino" type = "radio"><label>Masculino</label>
                        </div>
                        <div style ="display: block;">
                            <input id = "femenino" type = "radio" ><label>Femenino</label>
                        </div>
                        
                    </div>
              </div>
              <div class ="card-footer">
                  <button id = "buscar-usuario" type = "submit" class = "btn bg-gradient-primary float-right m-1">Guardar</button>
                  <button type = "button" data-dismiss = "modal" class = "btn btn-outline-secondary float-right m-1">Cerrar</button>
              </div>
            </form>
          </div>
      </div>
    </div>
</div>

<!-- Final del modal -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
                <h1>
                    Gestion Usuario
                     <?php if($_SESSION['us_tipo']!=3){ ?>
                    <button type = "button" data-toggle ="modal" data-target = "#crear-usuario" class = "btn bg-gradient-primary ml-2">
                        Crear usuario
                    </button>
                    <?php }; ?> 
                </h1>
                <input type = "hidden" id ="tipo_us" value="<?php echo $_SESSION['us_tipo'] ?>">
                <input type ="hidden" id ="pkUsuario" value = "<?php $_SESSION['usuario'] ?>">
            </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalago.php">Home</a></li>
              <li class="breadcrumb-item active">Gestion Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class ="container-fluid">
            <div class = "card card-success">
                <div class = "card-header">
                    <h3 class = "card-tittle">Buscar Usuario</h3>
                    <div class = "input-group">
                        <input id = "buscar-usuario" type = "text" class = "form-control float-left" placeholder ="Nombre de usuario">
                        <div class = "input-group-append">
                            <button class = "btn btn-default">
                                <i class = "fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class = "card-body">
                    <div id = "usuarios" class = "row d-flex align-stretch">
                        
                    </div>
                </div>
                <div class = "card-footer">

                </div>
            </div>
        </div>
    </section>
</div>

<?php
}
else
{
    header('Location:../index.php');
}
include_once 'layouts/footer.php'
?>
<script src = "../js/GestionUsuario.js"></script>