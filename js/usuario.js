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
            let avatar ='';
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
           avatar+=`${usuario.avatar}`;
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
           $('#avatar-img1').attr('src', avatar);
           $('#avatar-img2').attr('src', avatar);
           $('#avatar-img3').attr('src', avatar);
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

    $('#form-usuario').submit(a=>{
        if(edit)
        {
            
            funcion = 'actualizar_datos';
            let telefono = $('#telefono').val();
            let sexo =$('#sexo').val();
            let correo = $('#correo').val();
            let adicional = $('#adicional').val();
            let residencia = $('#residencia').val();
            $.post('../controlador/UsuarioController.php',{funcion, id_usuario, telefono, sexo, correo, adicional, residencia},(response)=>{
                
                $('#editado-span').hide('slow');
                $('#editado-span').show(1000);
                $('#editado-span').hide(2000);
                $('#form-usuario').trigger('reset');
                
                edit = false;
                buscar_usuario(id_usuario);
            })
        }
        else
        { 
            $('#sin_guardar').hide('slow');
            $('#sin_guardar').show(1000);
            $('#sin_guardar').hide(2000);
            $('#form-usuario').trigger('reset'); 
        }
        a.preventDefault();
    });
    $('#form-pass').submit(e=>{
        let oldPass = $('#old_pass').val();
        let newPass = $('#new_pass').val();
        funcion = "cambiarPass";

        $.post('../controlador/UsuarioController.php',{funcion, id_usuario, oldPass, newPass}, (response)=>{
            if(response=='update')
            {
                $('#pass-span').hide('slow');
                $('#pass-span').show(1000);
                $('#pass-span').hide(2000);
                $('#form-pass').trigger('reset');
            }
            else
            {
                $('#nopass-span').hide('slow');
                $('#nopass-span').show(1000);
                $('#nopass-span').hide(2000);
                $('#form-pass').trigger('reset');
            }
        });
        e.preventDefault();
    });

    $('#form-avatar').submit(e=>{
        let formData = new FormData($('#form-avatar')[0]);
        $.ajax({
            url: '../controlador/UsuarioController.php',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false
        }).done(function(response){
            const json = JSON.parse(response);
            if(json.alert=='edit')
            {
                $('#avatar-img1').attr('src',json.ruta);
                $('#avatar-img2').attr('src', json.ruta);
                $('#avatar-img3').attr('src', json.ruta);
                
                $('#avatar-span').hide('slow');
                $('#avatar-span').show(1000);
                $('#avatar-span').hide(2000);
                $('#form-avatar').trigger('reset');
            }
            else
            {
                $('#noavatar-span').hide('slow');
                $('#noavatar-span').show(1000);
                $('#noavatar-span').hide(2000);
                $('#noavatar-span').trigger('reset');
            }
        });
        e.preventDefault();
    });
 });  
