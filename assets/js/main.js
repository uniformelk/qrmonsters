const salir = document.querySelector('#exit');

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