<template>
  <Layout>
    <div class="content-wrapper">
      <v-card elevation="2">
        <v-card-title>
          <v-toolbar-title>{{ titulo }}</v-toolbar-title>

          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <!--  <div  class="nav-link"
            ><modalEmpresa/></div
          > -->
          <Link href="/vendas/criar" class="nav-link"
            ><button class="btn btn-primary">Nova Venda</button></Link
          >
        </v-card-title>
        <v-card-title>
          <v-toolbar-title>Vendedor: {{ vendedor.nome }}</v-toolbar-title>
          <v-divider class="mx-4"></v-divider>
        </v-card-title>

        <v-container>
          <v-row>
            <v-col cols="12" md="3">
              <v-text-field
                v-model="pesquisa.filial"
                type="number"
                label="Filial"
              ></v-text-field>
            </v-col>

            <v-col cols="12" md="3">
              <v-text-field
                v-model.number="pesquisa.pedido"
                type="number"
                label="Nº Pedido"
              ></v-text-field>
            </v-col>

            <v-col cols="12" md="3">
              <v-text-field
                v-model="pesquisa.data_inicio"
                label="Data inicio"
                required
                type="date"
              ></v-text-field>
            </v-col>
            <v-col cols="12" md="3">
              <v-text-field
                v-model="pesquisa.data_fim"
                label="Data fim"
                required
                type="date"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" md="6">
              <v-autocomplete
                ref="pesquisa.cliente_id"
                v-model="pesquisa.cliente_id"
                :items="clientes"
                item-text="rzsocial"
                item-value="id"
                label="Clientes"
                placeholder="Selecione..."
                required
              ></v-autocomplete>
              <v-card-text style="height: 100px; position: absolute">
                <v-fab-transition>
                  <Link href="/clientes/criar" class="nav-link">
                    <v-btn
                      color="pink"
                      dark
                      absolute
                      top
                      right
                      fab
                      small
                      style="background-color: #e91e63"
                    >
                      <v-icon>mdi-plus</v-icon>
                    </v-btn>
                  </Link>
                </v-fab-transition>
              </v-card-text>
            </v-col>
          </v-row>
          <v-btn color="success" class="mr-4 botao" @click="listarVendas">
            Pesquisar pedidos
          </v-btn>
        </v-container>
        <div class="text-center" v-if="loading">
          <v-progress-circular
            indeterminate
            color="primary"
          ></v-progress-circular>
        </div>
        <!-- <v-alert
          type="success"
          style="background-color: red; color: white !important"
        >
          jjajajajaja
        </v-alert> -->
        <v-card-title>
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Pesquisar"
            single-line
            hide-details
          ></v-text-field>
        </v-card-title>

        <v-data-table
          :headers="headers"
          :items="vendas"
          :search="search"
          item-key="name"
          class="elevation-1"
          :footer-props="{
            showFirstLastPage: true,
            firstIcon: 'mdi-arrow-collapse-left',
            lastIcon: 'mdi-arrow-collapse-right',
            prevIcon: 'mdi-minus',
            nextIcon: 'mdi-plus',
          }"
        >
          <template v-slot:item.total_pagamento="{ item }">
            <v-chip>
              <b>
                {{ item.total_pagamento | formatCurrency }}
              </b>
            </v-chip>
          </template>

          <template v-slot:item.actions="{ item }">
            <a
              href="javascript:;"
              title="VER DETALHES"
              class="botao ma-2 btn btn-primary btn-sm"
              @click="verPedido(item)"
            >
              <i class="far fa-eye"></i>
            </a>
          </template>
        </v-data-table>
        <v-dialog v-model="dialog" max-width="600px">
          <!-- <template v-slot:activator="{ on, attrs }">
            <v-btn
              color="primary"
              dark
              v-bind="attrs"
              v-on="on"
              class="botao-primary"
            >
              Nova Venda
            </v-btn>
          </template> -->
          <v-card>
            <v-card-title>
              <span class="text-h6">Detalhes do Pedido</span>
            </v-card-title>
            <v-card-text>
              <ul style="list-style: none">
                <li>
                  <b>Nº de Pedido:&nbsp;&nbsp; &nbsp;</b> {{ pedido.PV_CODIGO }}
                </li>
                <li>
                  <b>Filial:&nbsp;&nbsp; &nbsp;</b> {{ pedido.pedido_filial }}
                </li>
                <li>
                  <b>Razão social:&nbsp;&nbsp; &nbsp;</b>
                  {{
                    pedido.cliente
                      ? pedido.cliente.razao_social
                      : "sem registro"
                  }}
                </li>

                <li>
                  <b>Data de pagamento:&nbsp;&nbsp; &nbsp;</b>
                  {{ pedido.data_pagamento }}
                </li>
                <li>
                  <b>Total pago:&nbsp;&nbsp; &nbsp;</b>
                  {{ pedido.total_pagamento | formatCurrency }}
                </li>
                <li>
                  <b>Faturamento:&nbsp;&nbsp; &nbsp;</b>
                  {{ pedido.faturamento | formatCurrency }}
                </li>
                <li>
                  <b>Forma de pagamento:&nbsp;&nbsp; &nbsp;</b>
                  {{
                    pedido.forma_pagamento
                      ? pedido.forma_pagamento.descricao
                      : "sem registro"
                  }}
                </li>
                <li v-if="pedido.vendedor">
                  <b>Vendedor:&nbsp;&nbsp; &nbsp;</b>
                  {{ pedido.vendedor.nome }}
                </li>
                <li v-else>
                  <b>Vendedor:&nbsp;&nbsp; &nbsp;</b>
                  sem registro
                </li>
              </ul>
              <!--   <small>*indicates required field</small> -->
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue darken-1"
                text
                @click="dialog = false"
                class="botao-default-danger"
              >
                Fechar
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-card>
    </div>
  </Layout>
</template>
<style type="text/css">
.botao {
  background-color: #007bff !important;
  color: white !important;
}
.v-progress-circular {
  margin: 1rem;
}
</style>
<script>
import Layout from "../../Shared/Layout";
import { Head, Link } from "@inertiajs/inertia-vue";
import http from "../../services/axios";
import { mapGetters } from "vuex";
export default {
  components: {
    Head,
    Layout,
    Link,
    modalEmpresa: () => import("../../components/ModalEmpresas"),
  },
  props: {
    clientes: {
      type: Array,
      required: true,
    },
    data_atual: {
      type: String,
      required: true,
    },
    vendedor: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      titulo: "Pedido de Vendas",
      search: "",
      headers: [
        { text: "Filial", value: "pedido_filial" },
        { text: "Pedido", value: "PV_CODIGO" },
        { text: "Razão social", value: "cliente.razao_social" },

        { text: "Total de pag.", value: "total_pagamento", align: "right" },
        { text: "Forma de pag.", value: "forma_pagamento.descricao" },

        { text: "Opções", value: "actions", sortable: false, align: "center" },
      ],

      valid: false,
      firstname: "",
      lastname: "",
      nameRules: [
        //v => !!v || 'Name is required',
        (v) => Number.isInteger(Number(v)) || "Por favor digite um número",
      ],
      email: "",
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) => /.+@.+/.test(v) || "E-mail must be valid",
      ],
      pesquisa: { filial: "", pedido: "", cliente_id: 0, vendedor_id: 0 },
      dialog: false,
      pedido: {},
      //clientes: [],
    };
  },
  created() {
    this.pesquisa.data_inicio = this.pesquisa.data_fim = this.data_atual;
  },
  mounted() {
    this.listarVendas();
  },

  computed: {
    ...mapGetters(["vendas", "loading", "erro_lista_vendas", "alerta"]),
  },

  methods: {
    //...mapActions(["listarVendas"])

    /* listarVendas: async function(page=1)  {
          await  http.get('/vendas/listar-por-data', 
         {
            params: { pesquisa: this.pesquisa},
          })
            .then(response => {
               this.vendas= response.data;
               
            })
            .catch(error => {
                console.log(error)
            })
        } */
    listarVendas: function () {
      
      this.$store.dispatch("listarVendas", this.pesquisa);
         
      //this.vendas=this.$store.state.pedidos_vendas;
    },
    verPedido: function (item) {
      this.pedido = item;
      this.dialog = true;
    },
  },
};
</script>
  