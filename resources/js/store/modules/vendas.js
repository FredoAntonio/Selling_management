
import http  from '../../services/axios'
export default{

  state:{
    pedidos_vendas: [],
    loading:false,
    erro:false,
    
  },
    mutations:{
        LISTAR_VENDAS(state, payload){
            state.pedidos_vendas = payload;
           
        },
        LOADING(state, payload){

            state.loading = payload;
        },
        ERRO_VENDAS(state, payload){

          state.erro = payload;
      },
      
    },
    actions:{
         async listarVendas(context, payload){
            context.commit('LOADING', true);
          await  http.get('/vendas/listar-por-data', {
            params: { pesquisa: payload},
          })
            .then(response => {
                context.commit('LISTAR_VENDAS', response.data)
                context.commit('LOADING', false);
            })
            .catch(error => {
                console.log(error)
                //context.commit('ERRO_VENDAS', true);
            })
        },
       
       
    },
    getters:{
         vendas(state){
            return state.pedidos_vendas;
        },
        loading(state){

          return state.loading;

        },
        erro_lista_vendas(state){

          return state.erro;

        }

       
          
    }
        

}