class UI{
  
    alerta(msg, tipo){
      const form = document.querySelector(".form");
      const divMensaje = document.createElement('div');
      divMensaje.classList.add('text-center', 'alert', 'd-block', 'col-12');
  
      if(tipo === 'error'){
        divMensaje.classList.add('alert-danger', 'error', 'm-auto', 'w-75');
      }
      if(tipo === 'success'){
        divMensaje.classList.add('alert-success', 'alert', 'mt-3');
      }
      
  
      divMensaje.textContent = msg;
      form.appendChild(divMensaje);
  
      setTimeout(()=>{
        divMensaje.remove();
      }, 5000);
    }
  
  }

  export default UI;