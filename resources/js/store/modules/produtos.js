
import http  from '../../services/axios'
export default{

  state:{
    produtos: [],
  },
    mutations:{
        LISTAR_PRODUTOS(state, payload){
            state.produtos = payload;
        },
    },
    actions:{
         async listarProdutos(context){
          await  http.get('/produtos/listar')
            .then(response => {
                context.commit('LISTAR_PRODUTOS', response.data)
            })
            .catch(error => {
                console.log(error)
            })
        }
    },
    getters:{
        produtos(state){
            return state.produtos;
        }
    }
        

}