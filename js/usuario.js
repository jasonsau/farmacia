$(document).ready(function(){
    var funcion='';
    var id_usuario = $('#id_usuario').val();
    var edit =false;
    buscar_usuario(id_usuario);

    function buscar_usuario(dato)
    {
        
        funcion = 'buscar_usuario';
        $.post('../controlador/UsuarioController.php', {dato, funcion}, (response)=>{
            let nombre ='';
            let apellidos ='';
            let edad ='';
            let dni ='';
            let tipo ='';
            let telefono ='';
            let residencia ='';
            let correo ='';
            let sexo ='';
            let adicional ='';
           const usuario = JSON.parse(response); 
           nombre += `${usuario.nombre}`;
           apellidos+= `${usuario.apellido}`;
           edad += `${usuario.edad}`;
           dni += `${usuario.dni}`;
           tipo += `${usuario.tipo}`;
           telefono += `${usuario.telefono}`;
           residencia += `${usuario.residencia}`;
           correo += `${usuario.correo}`;
           sexo += `${usuario.sexo}`;
           adicional += `${usuario.adicional}`;
           $('#nombre_us').html(nombre);
           $('#apellidos_us').html(apellidos);
           $('#dni').html(dni);
           $('#edad').html(edad);
           $('#administrador').html(tipo);
           $('#telefono_us').html(telefono);
           $('#correo_us').html(correo);
           $('#sexo_us').html(sexo);
           $('#informacion_us').html(adicional);
           $('#residencia_us').html(residencia);
        });
    }

    $(document).on('click','.edit',(e)=>{
        funcion ='capturar_datos';
        edit =true;
        $.post('../controlador/UsuarioController.php',{funcion,id_usuario}, (response)=>{
            let telefono='';
            let sexo ='';
            let residencia ='';
            let correo = '';
            let adicional = '';

            const usuario =JSON.parse(response);
            telefono += `${usuario.telefono}`;
            sexo += `${usuario.sexo}`;
            residencia += `${usuario.residencia}`;
            correo += `${usuario.correo}`;
            adicional += `${usuario.adicional}`;
            $('#residencia').val(residencia);
            $('#telefono').val(telefono);
            $('#sexo').val(sexo);
            $('#correo').val(correo);
            $('#adicional').val(adicional);

        });
    });

    $('#form-usuario').submit(e=>{
        if(edit=true)
        {
            funcion = 'actualizar_datos';
            let telefono = $('#telefono').val();
            let sexo =$('#sexo').val();
            let correo = $('#correo').val();
            let adicional = $('#adicional').val();
            let residencia = $('#residencia').val();
            $.post('../controlador/UsuarioController.php',{funcion, id_usuario, telefono, sexo, correo, adicional, residencia},(response)=>{
                console.log('Hola');
                $('#editado-span').hide('slow');
                $('#editado-span').show(1000);
                $('#editado-span').hide(2000);
                $('#form-usuario').trigger('reset');
                edit = false;
                buscar_usuario(id_usuario);
            });
        }
        else
        {

        }
        e.preventDefault();
    });
 });  