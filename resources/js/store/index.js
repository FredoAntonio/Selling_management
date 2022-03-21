import Vue from 'vue'
import Vuex from 'vuex'
import clientes from './modules/clientes'
import cidades from './modules/cidades'
import vendas from './modules/vendas'
import empresas from './modules/empresas'
import services from './modules/services'
import produtos from './modules/produtos'
import prazos from './modules/prazos'
import documentos from './modules/documentos'
Vue.use(Vuex)

export default new Vuex.Store({
   
  modules: {
    clientes,
    cidades,
    vendas,
    empresas,
    services,
    produtos,
    prazos,
    documentos
  }
})
