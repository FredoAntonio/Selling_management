
import http  from '../../services/axios'
export default{

  state:{
    tipos: [],
   
    
  },
    mutations:{
        LISTAR_TIPOS(state, payload){
            state.tipos = payload;
           
        },
        
      
    },
    actions:{
         async listarTipos(context, payload){
            
          await  http.get('/documentos/listar-tipos')
            .then(response => {
                context.commit('LISTAR_TIPOS', response.data)
              
            })
            .catch(error => {
                console.log(error)
                //context.commit('ERRO_VENDAS', true);
            })
        },
       
       
    },
    getters:{
         tipos(state){
            return state.tipos;
        },
        

       
          
    }
        

}