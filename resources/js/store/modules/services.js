
import Swal from "sweetalert2";
export default{

  state:{
  
  },
    mutations:{
      
    },
    actions:{
        goBack() {
            window.history.back();
          },
          alerta(context, payload){
           //console.log(payload, titulo, mensagem)
            Swal.fire({
              icon: payload.tipo,
              title: payload.titulo,
              text: payload.texto,
              showConfirmButton: true,
              
              
            });

          },
          
    },
    getters:{
     
    }
        

}