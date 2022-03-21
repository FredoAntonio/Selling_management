<template>
  <Layout>
    <!-- Main content -->

    <div class="content-wrapper">
    
    
      <div class="card card-default">
        <div class="card-header">
          <!-- <h2 class="card-title">{{titulo}}</h2> -->
          <v-toolbar-title>{{ titulo }}</v-toolbar-title>

          <div class="card-tools">
           
           
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
              @click="back"
              style="color:blue;"
            >
            
              Voltar
             
            </button>
           
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="remove"
            >
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <form @submit.prevent="cadastrar">
          <div class="card-body">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- /.card-header -->
                <!-- form start -->

                <div class="form-group">
                  <label for="exampleInputPassword1">CNPJ</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder=""
                    v-model="cliente.cnpj"
                    :class="erros.cnpj ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.cnpj"
                    style="color: red; font-weight: bold"
                    >{{ erros.cnpj[0] }}</span
                  >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome Fantasia</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.nome_fantasia"
                    :class="erros.nome_fantasia ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.nome_fantasia"
                    style="color: red; font-weight: bold"
                    >{{ erros.nome_fantasia[0] }}</span
                  >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CEP</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder=""
                    v-model="cliente.cep"
                    :class="erros.cep ? 'has-error' : ''"
                  />

                  <span
                    v-if="erros.cep"
                    style="color: red; font-weight: bold"
                    >{{ erros.cep[0] }}</span
                  >
                </div>

                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
              </div>
              <!-- /.card-body -->

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Inscrição Estadual</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.inscricao_estadual"
                    :class="erros.inscricao_estadual ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.inscricao_estadual"
                    style="color: red; font-weight: bold"
                    >{{ erros.inscricao_estadual[0] }}</span
                  >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Razão Social</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder=""
                    v-model="cliente.rz_social"
                    :class="erros.rz_social ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.rz_social"
                    style="color: red; font-weight: bold"
                    >{{ erros.rz_social[0] }}</span
                  >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Endereço</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.endereco"
                    :class="erros.endereco ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.endereco"
                    style="color: red; font-weight: bold"
                    >{{ erros.endereco[0] }}</span
                  >
                </div>
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Número de Endereço</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.endereco_numero"
                    :class="erros.endereco_numero ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.endereco_numero"
                    style="color: red; font-weight: bold"
                    >{{ erros.endereco_numero[0] }}</span
                  >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Endereço Completo</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.endereco_compl"
                    :class="erros.endereco_compl ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.endereco_compl"
                    style="color: red; font-weight: bold"
                    >{{ erros.endereco_compl[0] }}</span
                  >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input
                    type="emai"
                    class="form-control"
                    v-model="cliente.email"
                    :class="erros.email ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.email"
                    style="color: red; font-weight: bold"
                    >{{ erros.email[0] }}</span
                  >
                </div>
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bairro</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.endereco_bairro"
                    :class="erros.endereco_bairro ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.endereco_bairro"
                    style="color: red; font-weight: bold"
                    >{{ erros.endereco_bairro[0] }}</span
                  >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Cidade</label>
                  <select
                    v-model="cliente.cidade"
                    class="form-control"
                    :class="erros.cidade ? 'has-error' : ''"
                  >
                    <option value="">Selecione</option>
                    <option
                      v-for="cidade in cidades"
                      v-bind:value="cidade.id"
                      :key="cidade.id"
                    >
                      {{ cidade.nome }}
                    </option>
                  </select>
                  <span
                    v-if="erros.cidade"
                    style="color: red; font-weight: bold"
                    >{{ erros.cidade[0] }}</span
                  >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Contato</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.contato"
                    :class="erros.contato ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.contato"
                    style="color: red; font-weight: bold"
                    >{{ erros.contato[0] }}</span
                  >
                </div>
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Observações</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cliente.obs"
                    :class="erros.obs ? 'has-error' : ''"
                  />
                  <span
                    v-if="erros.obs"
                    style="color: red; font-weight: bold"
                    >{{ erros.obs[0] }}</span
                  >
                </div>

                <!--  <div class="form-group">
                        <label for="exampleInputPassword1">Tipo de Fornecedor</label>
                        <input type="text" class="form-control" v-model="cliente.CLTIPO_FORNECEDOR">
                    </div>
                   <div class="form-group">
                        <label for="exampleInputPassword1">Tipo de Transportador</label>
                        <input type="text" class="form-control"  v-model="cliente.CLTIPO_TRANSPORTADOR">
                    </div> -->
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
              </div>

              <div class="col-md-6">
                <!-- 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo de Terceiros</label>
                        <input type="text" class="form-control"  v-model="cliente.CLTIPO_TERCEIROS">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contato</label>
                        <input type="text" class="form-control"  v-model="cliente.CLCONTATO">
                    </div>
                   <div class="form-group">
                        <label for="exampleInputPassword1">Observações</label>
                        <input type="text" class="form-control"  v-model="cliente.CLOBSERVACOES">
                    </div> -->
                <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->

                <div class="card-footer" style="margin-top: 20px !important">
                  <button
                    type="submit"
                    class="btn btn-primary"
                    style="color: white !important"
                  >
                    Enviar
                  </button>
                </div>
              </div>

              <!--  <div class="col-md-6">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Observações</label>
                        <input type="text" class="form-control"  v-model="cliente.CLOBSERVACOES">
                    </div>
                  
                   
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from "../../Shared/Layout";
import { Head } from "@inertiajs/inertia-vue";
import http from "../../services/axios";
import Swal from "sweetalert2";
import { Link } from "@inertiajs/inertia-vue";

//import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    Head,
    Layout,
  },
  props: {
    cidades: {
      type: Array,
      required: true,
    },
    
  },
  data() {
    return {
      titulo: "Cadastro de clientes",
      cliente: {obs:""},
      erros: [],
    };
  },

  mounted() {
 
    
  },
  computed: {
    //...mapGetters(["cidades"])
  },

  methods: {
    cadastrar: async function () {
      /*    await   this.$inertia.post('/clientes/cadastrar', {cliente:this.cliente},{
                preserveScroll: true,
                 onSuccess: (page) => {
                    return Promise.all([
                        
                               Swal.fire({
              icon: "success",
              title: "Atenção!",
              text: this.$page.props.flash.message,
              showConfirmButton: true,
              
              //timer: 1500,
            }),
                       
                    ])
                },
                onError: (errors) => {
                     Swal.fire({
              icon: "error",
              title: "Atenção!",
              text: errors.message,
              showConfirmButton: true,
              
              //timer: 1500,
            });
                  
                }
            
         }) */

      await http
        .post("/clientes/cadastrar", { cliente: this.cliente })
        .then((response) => {
          if (response.status === 200) {
            //this.saldo=response.data.saldo_atualizado;
            Swal.fire({
              title: "Sucesso",
              text: response.data,
              icon: "success",
              confirmButtonColor: "#3d5476",
              confirmButtonText: "Ok",
              willClose: () => {
               this.irParaListaClientes()
              },
            });
            
            
          }
        })
        .catch((error) => {
          console.log(error.response);
          if (error.response.status == 422) {
            this.erros = error.response.data.errors;
          } else {
            Swal.fire({
              icon: "error",
              title: "Atenção!",
              text: error.response.data,
              showConfirmButton: true,

              //timer: 1500,
            });
          }
        });
      //...mapActions(["listarCidades"]),
    },
    irParaListaClientes: function () {
      this.$inertia.get("/clientes/index");
    },
    back() {
      window.history.back();
    },
  },
};
</script>
  