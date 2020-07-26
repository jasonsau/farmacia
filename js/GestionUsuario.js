$(document).ready(function(){

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
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: ${usuario.residencia}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: ${usuario.telefono}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="${usuario.avatar}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
                `;
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
});