import UI from "./clases/ui.js";
const user = document.querySelector('#user');
const password = document.querySelector('#password');
const email = document.querySelector('#email');
const names = document.querySelector('#names');
const form = document.querySelector(".form");
const ui = new UI();


const datosRegistro = {
  user: '',
  password: '',
  email: '',
  names: ''
}

eventListeners();
function eventListeners(){
  user.addEventListener('input', datos);
  password.addEventListener('input', datos);
  email.addEventListener('input', datos);
  names.addEventListener('input', datos);
  form.addEventListener('submit', validaDatos);
}

function datos(e){
  e.preventDefault();
  datosRegistro[e.target.name] = e.target.value;
}

function validaDatos(e){
  e.preventDefault();
  var reLargo = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
  const {user, password, email, names} = datosRegistro;

  if(user === '' || password === '' || email === '' || names === ''){
    ui.alerta('Todos los campos son obligatorios', 'error');
    return;
  }
  if(reLargo.test(email)){
    crearUsuario();
  }else{
    ui.alerta('El correo debe tener una estructura valida como "ejemplo@ejemplo.com"', 'error');
  }

  //validaUsuario(datosRegistro);
}

$(document).ready(function(){
  
});

function crearUsuario(){

  const {user, password, email, names} = datosRegistro;
  $.ajax({
    async: true,
    type: "POST",
    url: "includes/functions/system/login.php",
    data: {
        flag: 2,
        user: user,
        password: password,
        email: email,
        names: names
    },
    dataType: 'json',
    //beforeSend: function (){},
    error: function (request, status, error){
        alert(request.responseText);
    },
    success: function (respuesta){
        switch(respuesta.estado){
            case 1:
              ui.alerta(respuesta.mensaje, 'success');
              setTimeout(()=>{
                window.location.href = 'index.php';
              }, 5000);
            break;
            case 2:
                ui.alerta(respuesta.mensaje, 'error');
            break;
        }
        
        
    },
    
});
   
}