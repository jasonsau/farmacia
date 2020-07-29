$(document).ready(function(){
  var tipoUsuario=$('#tipo_us').val();
    buscarDatos();
    var funcion;

    function buscarDatos(valor)
    {
        funcion = "buscarDatos";
        $.post('../controlador/UsuarioController.php', {funcion, valor}, (response)=>{
            const usuario = JSON.parse(response);
            let template='';
            usuario.forEach(usuario => {
                template+=`
                <div id_usuario="${usuario.idUsuario}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  ${usuario.tipo}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>${usuario.nombre} ${usuario.apellido}</b></h2>
                      <p class="text-muted text-sm"><b>sobre mi: </b> ${usuario.adicional} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Correo: ${usuario.correo}</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Sexo : ${usuario.sexo}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Direccion: ${usuario.residencia}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono #: ${usuario.telefono}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="${usuario.avatar}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">`;
                if(tipoUsuario==4)
                {
                    if(usuario.tipoUsuario!=4)
                    { 
                        template+=`
                        <button class ="eliminar btn-danger btn mr-1" data-target = "#confirmar" data-toggle = "modal">
                        <i class ="fas fa-window-close mr-1"></i>Eliminar
                        </button>
                        `;
                    }
                    if(usuario.tipoUsuario==3)
                    {
                        template+=`
                        <button class ="ascender btn btn-primary ml-1" data-toggle = "modal" data-target = "#confirmar">
                        <i class ="fas fa-sort-amount-up mr-1"></i>Ascender
                        </button>
                        `;
                    }
                    if(usuario.tipoUsuario==2)
                    {
                        template+=`
                        <button class ="descender btn btn-secondary ml-1" data-toggle = "modal" data-target = "#confirmar">
                        <i class ="fas fa-sort-amount-down mr-1"></i>Descender
                        </button>
                        `;
                    }
                }
                else
                {
                  if(tipoUsuario==2 && usuario.tipoUsuario!=2 &&usuario.tipoUsuario!=4)
                  {
                      template+=`
                    <button class ="eliminar btn-danger" data-toggle = "modal" data-target = "#confirmar">
                      <i class ="fas fa-window-close mr-1"></i>Eliminar
                    </button>
                    `;
                  }
                }
                template+=`
                  </div>
                </div>
              </div>
            </div>`;
            });
            $('#usuarios').html(template);
        });
    }

    $(document).on('keyup', '#buscar-usuario',function(){
        let valor =$(this).val();
        if(valor!="")
        {
            buscarDatos(valor);
        }
        else
        {
            buscarDatos();
        }
    });

    $('#form-crear-usuario').submit(e=>{
        let nombre = $('#nombre').val();
        let apellido =$('#apellidos').val();
        let dni = $('#dni').val();
        let password = $('#password').val();
        let fecha = $('#fecha').val();

        funcion ="crearUsuario";
        $.post('../controlador/UsuarioController.php',{funcion, nombre, apellido, dni, password, fecha}, (response)=>{
            if(response == "guardado")
            {
                $('#guardar').hide('slow');
                $('#guardar').show(1000);
                $('#guardar').hide(2000);
                $('#form-crear-usuario').trigger('reset'); 
                buscarDatos();
            }
            else
            {
                $('#sin_guardar').hide('slow');
                $('#sin_guardar').show(1000);
                $('#sin_guardar').hide(2000);
                $('#form-crear-usuario').trigger('reset');
            }
      });
      e.preventDefault();
        
    });

    $(document).on('click','.ascender', (e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        const id = $(elemento).attr('id_usuario');
        funcion ="ascender";
        $('#id_user').val(id);
        $('#id_funcion').val(funcion);
    });

    $(document).on('click','.descender', (e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        const id = $(elemento).attr('id_usuario');
        funcion ="descender";
        $('#id_user').val(id);
        $('#id_funcion').val(funcion);
    });

    $(document).on('click','.eliminar', (e)=>{
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;
        const id = $(elemento).attr('id_usuario');
        funcion ="eliminar";
        $('#id_user').val(id);
        $('#id_funcion').val(funcion);
    });

    $('#form-confirmar').submit(e=>{
        let pass = $('#pass-confirmar').val();
        let id_usuario = $('#id_user').val();
        funcion = $('#id_funcion').val();
        switch(funcion)
        {
            case "ascender":
                let tipoAs=2;
                $.post('../controlador/UsuarioController.php', {funcion, pass, id_usuario, tipoAs}, (response)=>{
                    if(response == "hecho")
                    {
                        $('#alert-ascender').hide('slow');
                        $('#alert-ascender').show(1000);
                        $('#alert-ascender').hide(2000);
                        $('#form-confirmar').trigger('reset'); 
                        buscarDatos();
                    }
                    else
                    {
                        $('#alert-sin-ascender').hide('slow');
                        $('#alert-sin-ascender').show(1000);
                        $('#alert-sin-ascender').hide(2000);
                        $('#form-confirmar').trigger('reset'); 
                    }
                });
            break;
            case "descender":
                let tipoDes=3;
                    $.post('../controlador/UsuarioController.php', {funcion, pass, id_usuario, tipoDes}, (response)=>{
                        if(response == "hecho")
                        {
                            $('#alert-ascender').hide('slow');
                            $('#alert-ascender').show(1000);
                            $('#alert-ascender').hide(2000);
                            $('#form-confirmar').trigger('reset'); 
                            buscarDatos();
                        }
                        else
                        {
                            $('#alert-sin-ascender').hide('slow');
                            $('#alert-sin-ascender').show(1000);
                            $('#alert-sin-ascender').hide(2000);
                            $('#form-confirmar').trigger('reset'); 
                        }
                    });
            break;
            case "eliminar":

                $.post('../controlador/UsuarioController.php', {funcion, pass, id_usuario}, (response)=>{
                    if(response == "eliminado")
                    {
                        $('#alert-ascender').hide('slow');
                        $('#alert-ascender').show(1000);
                        $('#alert-ascender').hide(2000);
                        $('#form-confirmar').trigger('reset'); 
                        buscarDatos();
                    }
                    else
                    {
                        $('#alert-sin-ascender').hide('slow');
                        $('#alert-sin-ascender').show(1000);
                        $('#alert-sin-ascender').hide(2000);
                        $('#form-confirmar').trigger('reset'); 
                     }
                });
            break;
        }
        e.preventDefault();
    });

});


