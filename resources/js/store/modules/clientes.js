
import http  from '../../services/axios'
export default{

  state:{
    clientes: [],
  },
    mutations:{
        LISTAR_CLIENTES(state, payload){
            state.clientes = payload;
        },
       
    },
    actions:{
         async listarClientes(context){
          await  http.get('/clientes/listar')
            .then(response => {
                context.commit('LISTAR_CLIENTES', response.data)
            })
            .catch(error => {
                console.log(error)
            })
        },
         
    },
    getters:{
        clientes(state){
            return state.clientes;
        }
    }
        

}