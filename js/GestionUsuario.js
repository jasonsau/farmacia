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
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
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
                    <button class ="btn-danger btn mr-1">
                      <i class ="fas fa-window-close mr-1"></i>Eliminar
                    </button>
                    `;
                  }
                  if(usuario.tipoUsuario==3)
                  {
                    template+=`
                    <button class ="btn btn-primary ml-1">
                      <i class ="fas fa-window-close mr-1"></i>Ascender
                    </button>
                    `;
                  }
                }
                else
                {
                  if(tipoUsuario==2 && usuario.tipoUsuario!=2 &&usuario.tipoUsuario!=4)
                  {
                      template+=`
                    <button class ="btn-danger">
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
      let id = $('#pkUsuario');
      funcion ="crearUsuario";
      $.post('../controlador/UsuarioController.php',{funcion, id, nombre, apellido, dni, password, fecha, }, (response)=>{

      });
      e.preventDefault();
    });

});