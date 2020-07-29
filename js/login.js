jonst inputs = document.querySelectorAll(".input");


function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
}

function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
                    parent.classList.remove("focus");
                }
}


inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
});

$(document).on('click','#mostrar-pass',(e)=>{
        let pass = document.getElementById('pass');
        let icon = document.getElementById('eye');
        let tipo = pass.getAttribute('type');
        let tipoEye = icon.getAttribute('name');
        if(tipo=='password' && tipoEye == 'eye-off-outline')
        {
                pass.setAttribute('type','text');
                icon.setAttribute('name', 'eye-outline')
        }
        else
        {
                pass.setAttribute('type','password');
                icon.setAttribute('name','eye-off-outline');
        }
        e.preventDefault();
});
