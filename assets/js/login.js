import UI from "./clases/ui.js";

const user = document.querySelector('#user');
const password = document.querySelector('#password');
const form = document.querySelector(".form");
const ui = new UI();

const datosLogin = {
  user: '',
  password: ''
}
eventListeners();
function eventListeners(){
  user.addEventListener('input', datos);
  password.addEventListener('input', datos);
  form.addEventListener('submit', validaDatos);
}

function datos(e){
  e.preventDefault();
  datosLogin[e.target.name] = e.target.value;
}

function validaDatos(e){
  e.preventDefault();
  
  const {user, password} = datosLogin;

  if(user === '' || password === ''){
    ui.alerta('Todos los campos son obligatorios', 'error');
    return;
  }

  validaUsuario(datosLogin);
}

$(document).ready(function(){
  
});

function validaUsuario(datosLogin){

  const {user, password} = datosLogin;
  console.log(`usuario ${user} pass ${password}`);
  $.ajax({
    async: true,
    type: "POST",
    url: "includes/functions/system/login.php",
    data: {
        flag: 1,
        user: user,
        password: password
    },
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
                ui.alerta(respuesta.mensaje, 'error');
            break;
        }
        
        
    },
    
  }); 
}