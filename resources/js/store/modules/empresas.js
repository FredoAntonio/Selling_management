
import _ from 'lodash';
import http  from '../../services/axios'
export default{

  state:{
    empresas: [],
    empresa:{},
  },
    mutations:{
        LISTAR_EMPRESAS(state, payload){
            state.empresas = payload;
        },
        EMPRESA(state, payload){
            state.empresa = payload;
        }
    },
    actions:{
         async listarEmpresas(context){
          await  http.get('/empresas/listar')
            .then(response => {
                context.commit('LISTAR_EMPRESAS', response.data)
            })
            .catch(error => {
                console.log(error)
            })
        },
        salvaEmpresa(context, payload){
            
            context.commit('EMPRESA', payload)
  
          }
        
    },
    getters:{
        empresas(state){
            return state.empresas;
        },
        empresa(state){
           
            return state.empresa;
  
          },
    }
        

}