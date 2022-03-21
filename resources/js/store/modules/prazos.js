
import http  from '../../services/axios'
export default{

  state:{
    prazos: [],
   
    
  },
    mutations:{
        LISTAR_PRAZOS(state, payload){
            state.prazos = payload;
           
        },
        
      
    },
    actions:{
         async listarPrazos(context, payload){
            
          await  http.get('/prazos/listar')
            .then(response => {
                context.commit('LISTAR_PRAZOS', response.data)
              
            })
            .catch(error => {
                console.log(error)
                //context.commit('ERRO_VENDAS', true);
            })
        },
       
       
    },
    getters:{
         prazos(state){
            return state.prazos;
        },
        

       
          
    }
        

}