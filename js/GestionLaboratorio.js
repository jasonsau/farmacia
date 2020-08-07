$(document).ready(function(){
    let funcion = "";

    buscarLaboratorio();

    //Busqueda de los laboratorios
    function buscarLaboratorio(valor)
    {
        funcion ="buscarLaboratorio"
        $.post('../controlador/LaboratorioController.php',{funcion, valor}, (response)=>{
             const laboratorios = JSON.parse(response);
             let template = "";
             laboratorios.forEach(laboratorios =>{
                 template+=`<tr idLaboratorio = ${laboratorios.id}>
                     <td>${laboratorios.nombre}</td>
                     <td><img style = "width:50px; heigth:50px;" src ="${laboratorios.avatar}"></td>
                     <td>
                        <button class = "btn btn-info" title = "Cambiar el logo del laboratorio" data-target = "#cambiarAvatarLaboratorio" data-toggle = "modal"><i class = "far fa-image"></i></button>
                        <button class = "btn btn-success" title = "Editar el laboratorio"><i class = "fas fa-pencil-alt"></i></button>
                        <button class = "btn btn-danger" title = "Eliminar el laboratorio"><i class = "fas fa-trash-alt"></i></button>
                    </td>
                     </tr>`;
             });
             $("#laboratorios").html(template);
        });
    }

    //Crear un laboratorio
    $(formCrearLaboratorio).submit(e=>{
        let nombre = $('#nombreLaboratorio').val();
        funcion = "crearLaboratorio"
        $.post('../controlador/LaboratorioController.php', {nombre, funcion}, (response)=>{
            if(response == "Guardado")
            {
                buscarLaboratorio();
                $('#alertCrear').hide('slow');
                $('#alertCrear').show(1000);
                $('#alertCrear').hide(2000);
                $('#alertCrear').trigger('reset');

            }
            else
            {
                $('#alertSinCrear').hide('slow');
                $('#alertSinCrear').show(1000);
                $('#alertSinCrear').hide(2000);
                $('#alertSinCrear').trigger('reset');
            }
        });
        e.preventDefault();

    });
    $(document).on('keyup', '#idLaboratorio', function(){
        let valor = $(this).val();
        if(valor!="")
        {
            buscarLaboratorio(valor);
        }
        else
        {
            buscarLaboratorio();
        }
    });
    
    //Funcion para cambiar el avatar del laboratorio
    $('#formAvatarLaboratorio').submit(e=>{
        console.log("Si entra al boton");

        e.preventDefault();
    });
})
