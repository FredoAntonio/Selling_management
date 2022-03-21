
import http  from '../../services/axios'
export default{

  state:{
    cidades: [],
  },
    mutations:{
        LISTAR_CIDADES(state, payload){
            state.clientes = payload;
        },
    },
    actions:{
         async listarCidades(context){
          await  http.get('/cidades/listar')
            .then(response => {
                context.commit('LISTAR_CIDADES', response.data)
            })
            .catch(error => {
                console.log(error)
            })
        }
    },
    getters:{
        cidades(state){
            return state.cidades;
        }
    }
        

}