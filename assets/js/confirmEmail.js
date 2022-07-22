import UI from "./clases/ui.js";

const key = document.querySelector('#key_id').value;
const contenido = document.querySelector('#contenido');
const ui = new UI();

activarCuenta();

$(document).ready(function(){
  
});

function activarCuenta(){
    $.ajax({
        async: true,
        type: "POST",
        url: "includes/functions/system/login.php",
        data: {
            flag: 3,
            key: key
        },
        dataType: 'json',
        //beforeSend: function (){},
        error: function (request, status, error){
            alert(request.responseText);
        },
        success: function (respuesta){
            switch(respuesta.estado){
                case 1:
                    limpiarHTML();
                    const mensaje = document.createElement('div');
                    mensaje.innerHTML = `
                        <h4 class="text-center mt-3">Tu cuenta ha sido verificada y activada</h4>
                        <a href="index" class="m-auto"> <button class="btn btn-lg w-100">Iniciar sesion</button> </a>
                    `;
                    contenido.appendChild(mensaje)
                break;
                case 2:
                    limpiarHTML();
                    const mensajeActivo = document.createElement('div');
                    mensajeActivo.innerHTML = `
                        <h4 class="text-center mt-3">Tu cuenta ya ha sido verificada y activada anteriormente</h4>
                        <a href="index" class="m-auto"> <button class="btn btn-lg w-100">Iniciar sesion</button> </a>
                    `;
                    contenido.appendChild(mensajeActivo)
                break;
                case 4:
                    limpiarHTML();
                    const mensajeError = document.createElement('div');
                    mensajeError.innerHTML = `
                        <h6 class="text-center mt-3">${respuesta.mensaje}</h6>
                    `;
                    contenido.appendChild(mensajeError)
                break;
            }
            
            
        },
        
    });
}

function limpiarHTML(){
    while(contenido.lastChild){
        contenido.removeChild(contenido.firstChild);
    }
}
