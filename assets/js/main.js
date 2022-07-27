import UI from "./clases/ui.js";
const ui = new UI();

const salir = document.querySelector('#exit');
const codigo = document.querySelector('#input-factura');
const idUser = document.querySelector('#inputId').value;
const botonRedimir = document.querySelector('#redimirAction');

//Eventos
botonRedimir.onclick = () => validarCodigo();
salir.onclick = () => endSession();

function endSession(){
    $.ajax({
        async: true,
        type: "POST",
        url: "includes/functions/system/endSession.php",
        data: {},
        dataType: 'json',
        //beforeSend: function (){},
        error: function (request, status, error){
            alert(request.responseText);
        },
        success: function (respuesta){
            switch(respuesta.estado){
                case 1:
                    location.reload();
                break;
                case 2:
                    console.log(respuesta.mensaje);
                break;
            }
            
            
        },
        
    }); 
}

function validarCodigo(){
    let code = codigo.value;
    if(code == ''){
        ui.alerta('Falta por diligenciar campos obligatorios', 'error');
        return;
    }
    
    $.ajax({
        async: true,
        type: "POST",
        url: "includes/functions/system/redimeCupon.php",
        data: {
            code: code
        },
        dataType: 'json',
        //beforeSend: function (){},
        error: function (request, status, error){
            alert(request.responseText);
        },
        success: function (respuesta){
            switch(respuesta.estado){
                case 1:
                    pushCodigo(Math.floor((Math.random() * (6 - 1 + 1)) + 1));
                break;
                case 2:
                    ui.alerta(respuesta.mensaje, 'error');
                break;
            }
            
            
        },
        
    });
}

function pushCodigo(idCodigo){
    let Codigo = idCodigo;
    let id_user = idUser;
    
}