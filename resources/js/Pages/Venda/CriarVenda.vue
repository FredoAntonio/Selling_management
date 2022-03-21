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
        </v-card-title>
        <!--  <v-btn
      :disabled="dialog"
      :loading="dialog"
      class="white--text"
      color="purple darken-2"
      @click="dialog = true"
    >
      Start loading
    </v-btn> -->
        <v-card-title>
          <v-toolbar-title>Vendedor: {{ vendedor.nome }}</v-toolbar-title>
          <v-divider class="mx-4"></v-divider>
        </v-card-title>
        <v-card-title>
          <v-toolbar-title style="font-size: 14px !important; font-weight: bold"
            >Último pedido: {{ ultima_venda.ID }}</v-toolbar-title
          >
        </v-card-title>
       <!--  <v-card-title>
          <v-toolbar-title  style="float: right !important"
            >Voltar</v-toolbar-title
          ></v-card-title
        > -->
        <v-container>
          <div class="card-body">
            <ul
              class="nav nav-tabs"
              id="custom-content-below-tab"
              role="tablist"
            >
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="custom-content-below-home-tab"
                  data-toggle="pill"
                  href="#custom-content-below-home"
                  role="tab"
                  aria-controls="custom-content-below-home"
                  aria-selected="true"
                  >Cliente</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="custom-content-below-profile-tab"
                  data-toggle="pill"
                  href="#custom-content-below-profile"
                  role="tab"
                  aria-controls="custom-content-below-profile"
                  aria-selected="false"
                  >Produtos</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="custom-content-below-messages-tab"
                  data-toggle="pill"
                  href="#custom-content-below-messages"
                  role="tab"
                  aria-controls="custom-content-below-messages"
                  aria-selected="false"
                  >Finalização</a
                >
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div
                class="tab-pane fade show active"
                id="custom-content-below-home"
                role="tabpanel"
                aria-labelledby="custom-content-below-home-tab"
              >
                <br />
                <v-row>
                  <v-col cols="12" md="3">
                    <v-text-field
                      :value="empresa.nome"
                      label="Empresa"
                      readonly
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model.number="venda.flag"
                      type="number"
                      label="Flag"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-autocomplete
                      ref="venda.cliente_id"
                      v-model="venda.cliente_id"
                      :items="clientes"
                      item-text="rzsocial"
                      item-value="id"
                      label="Clientes"
                      placeholder="Selecione..."
                      required
                      clearable
                    ></v-autocomplete>

                    <v-card-text
                      style="height: 100px; position: absolute"
                      v-if="!venda.cliente_id"
                    >
                      <v-fab-transition>
                        <Link href="/clientes/criar">
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
                    <v-card-text
                      style="height: 100px; position: absolute"
                      v-else
                    >
                      <modalCliente :cliente_id="venda.cliente_id" />
                    </v-card-text>
                  </v-col>
                </v-row>
              </div>
              <div
                class="tab-pane fade"
                id="custom-content-below-profile"
                role="tabpanel"
                aria-labelledby="custom-content-below-profile-tab"
              >
                <br />
                <v-row>
                  <v-col cols="12" md="6">
                    <v-autocomplete
                      v-model="produto"
                      :items="produtos"
                      label="Produtos"
                      item-text="descricao"
                      clearable
                      return-object
                    ></v-autocomplete>
                  </v-col>
                  <v-col cols="12" md="3">
                    <v-text-field
                      :value="produto.preco | formatCurrency"
                      label="Preço unitário"
                      readonly
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model.number="quantidade"
                      type="number"
                      style="text-align: center !important"
                      label="Quantidade"
                    >
                    </v-text-field>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model.number="desconto"
                      type="number"
                      label="Desconto"
                    >
                    </v-text-field>
                  </v-col>
                </v-row>

                <v-btn color="success" class="mr-4 botao" @click="validarForm">
                  <v-icon>mdi-plus</v-icon>adicionar produto</v-btn
                >
                <v-card-title>
                  <v-divider class="mx-4"></v-divider>
                </v-card-title>
                <v-data-table
                  :headers="headers"
                  :items="venda.produtos"
                  hide-default-footer
                  class="elevation-1"
                >
                  <template v-slot:item.preco="{ item }">
                    {{ item.preco | formatCurrency }}
                  </template>
                  <template v-slot:item.desconto="{ item }">
                    {{ item.desconto | formatCurrency }}
                  </template>
                  <template v-slot:item.total="{ item }">
                    {{ item.total | formatCurrency }}
                  </template>
                  <template v-slot:item.actions="{ item, index }">
                    <v-btn
                      small
                      color="red"
                      class="botao-danger"
                      @click="removerItem(item.total, item.desconto, index)"
                    >
                      <v-icon>mdi-delete</v-icon>
                    </v-btn>
                  </template>
                </v-data-table>
                <v-card-title>
                  <v-divider class="mx-4"></v-divider>
                  <v-toolbar-title
                    style="
                      font-size: 14px !important;
                      font-weight: bold;
                      float: right !important;
                    "
                    >Total desconto: R$
                    {{ venda.descontoTotal | formatCurrency }} | Total: R$
                    {{ venda.total | formatCurrency }}
                  </v-toolbar-title>
                </v-card-title>
              </div>
              <div
                class="tab-pane fade"
                id="custom-content-below-messages"
                role="tabpanel"
                aria-labelledby="custom-content-below-messages-tab"
              >
                <br />
                <v-row>
                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="venda.data_entrega"
                      label="Data de entrega"
                      required
                      type="date"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="3">
                    <v-autocomplete
                      v-model="venda.forma_pagamento"
                      :items="tipos"
                      label="Forma de pagamento"
                      item-text="descricao"
                      item-value="id"
                    ></v-autocomplete>
                  </v-col>
                  <v-col cols="12" md="3">
                    <v-autocomplete
                      v-model="venda.prazo_pagamento"
                      :items="prazos"
                      label="Prazo de pagamento"
                      item-text="descricao"
                      item-value="id"
                    ></v-autocomplete>
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="venda.obs"
                      style="text-align: center !important"
                      label="Observação"
                    >
                    </v-text-field>
                  </v-col>
                </v-row>
                <v-btn
                  color="success"
                  class="mr-4 botao"
                  @click="cadastrar"
                  :loading="loading"
                >
                  <v-icon>mdi-check</v-icon>finalizar venda</v-btn
                >
                <v-btn
                  color="success"
                  class="mr-4 botao"
                  @click="enviarPedidoPorEmail"
                  :loading="email_loading"
                >
                  <v-icon>mdi-print</v-icon>Enviar email</v-btn
                >
              </div>
            </div>
          </div>
          <ul
            class="red-text"
            style="
              font-weight: bold;
              font-size: 16px;
              color: red;
              list-style: none;
              margin-left: 15px;
            "
          >
            <li v-for="(group, index) in erros" v-bind:key="index">
              <ul style="list-style: none">
                <li v-for="(erro, key) in group" v-bind:key="key">
                  {{ erro }}
                </li>
              </ul>
            </li>
          </ul>
        </v-container>

        <!-- <v-simple-table fixed-header height="300px">
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Nº</th>
                <th class="text-left">Referência</th>
                <th class="text-left">Descrição</th>
                <th class="text-left">Unid.</th>
                <th class="text-left">Quant.</th>
                <th class="text-left">Preço unit.</th>
                <th class="text-left">Desconto</th>
                <th class="text-left">Total</th>
                <th class="text-left">Opçôes</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in venda.produtos" :key="item.id">
                <td>{{ ++index }}</td>
                <td>{{ item.referencia }}</td>
                <td>{{ item.descricao }}</td>
                <td>{{ item.unidade }}</td>
                <td>{{ item.quantidade }}</td>
                <td>{{ item.preco | formatCurrency }}</td>
                <td>{{ item.desconto | formatCurrency }}</td>
                <td>{{ item.total | formatCurrency }}</td>
                <td>
                  <v-btn
                    small
                    color="red"
                    class="botao-danger"
                    @click="removerItem(index)"
                  >
                    <v-icon>mdi-delete</v-icon>
                  </v-btn>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table> -->
        <modalEmpresa />
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
import { mapGetters, mapActions } from "vuex";
import Swal from "sweetalert2";
export default {
  components: {
    Head,
    Layout,
    Link,
    modalEmpresa: () => import("../../components/ModalEmpresas"),
    modalCliente: () => import("../../components/ModalCliente"),
  },
  props: {
    vendedor: {
      type: Object,
      required: true,
    },
    ultima_venda: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      titulo: "Novo Pedido de Venda",
      search: "",

      headers: [
        { text: "Referência", value: "referencia" },
        { text: "Descrição", value: "descricao" },
        { text: "Unid.", value: "unidade" },
        { text: "Quant.", value: "quantidade" },
        { text: "Preço unit.", value: "preco", align: "right" },
        { text: "Desconto", value: "desconto", align: "right" },
        { text: "Total", value: "total", align: "right" },

        { text: "Opções", value: "actions", sortable: false, align: "center" },
      ],

      venda: {
        total: 0,
        flag: 0,
        descontoTotal: 0,
        obs: "",
        produtos: [],
      },
      cliente: {},
      produto: { id: 0, quantidade: 0, desconto: 0, preco: 0 },
      quantidade: 1,
      desconto: 0,
      qtdRules: [
        (v) => !!v || "A quantidade é obrigatória",
        (v) => (v && v >= 0) || "Número inválido",
      ],
      produtoRules: [(v) => !!v || "O produto é obrigatório"],
      valid: false,
      loading: false,
      erros: [],
      email_loading: false,
    };
  },
  created() {},
  mounted() {
    this.listarClientes();
    this.listarProdutos();
    this.listarPrazos();
    this.listarTipos();
  },
  /* watch: {
      dialog (val) {
        if (!val) return

        setTimeout(() => (this.dialog = false), 4000)
      },
    }, */
  computed: {
    ...mapGetters(["empresa", "clientes", "produtos", "prazos", "tipos"]),

    finalizar() {
      if (
        this.venda.produtos.length === 0 ||
        this.venda.cliente_id === null ||
        this.venda.data_entrega === null ||
        this.venda.forma_pagamento === null ||
        this.venda.prazo_pagamento === null
      ) {
        return false;
      }
    },
  },

  methods: {
    ...mapActions([
      "listarClientes",
      "listarProdutos",
      "alerta",
      "listarPrazos",
      "listarTipos",
    ]),

    addProduto() {
      this.produto.desconto = this.desconto;
      this.produto.quantidade = this.quantidade;
      this.totalProduto();

      if (!this.produto.desconto) {
        this.produto.desconto = 0;
      }
      this.venda.produtos.push(this.produto);

      this.produto = {};
      this.produto.quantidade = 0;
      this.produto.desconto = 0;
      this.produto.preco = 0;
      this.quantidade = 1;
      this.desconto = 0;
      this.produto.id = 0;
    },

    totalProduto() {
      // total do item
      this.produto.total =
        parseFloat(this.produto.preco) * parseFloat(this.produto.quantidade) -
        parseFloat(this.produto.desconto);
      this.totaisVenda(this.produto.total, this.produto.desconto);
    },
    totaisVenda(total_produto, desconto) {
      // totais da venda

      this.venda.descontoTotal += desconto;
      this.venda.total += total_produto;
    },

    validarForm() {
      if (this.produto.id == 0) {
        this.$store.dispatch("alerta", {
          tipo: "warning",
          titulo: "Atenção!",
          texto: "Por favor selecione o produto",
        });
      } else if (this.quantidade < 1 || this.quantidade == null) {
        this.$store.dispatch("alerta", {
          tipo: "warning",
          titulo: "Atenção!",
          texto: "Por favor insira a quantidade",
        });
      } else {
        if (
          parseFloat(this.produto.preco) * parseFloat(this.quantidade) <
          parseFloat(this.desconto)
        ) {
          this.$store.dispatch("alerta", {
            tipo: "warning",
            titulo: "Atenção!",
            texto:
              "O desconto não pode ser maior que o valor do produto.(valor*qtd) Valor:" +
              parseFloat(this.produto.preco) * parseFloat(this.quantidade) +
              " | Desconto: " +
              this.desconto,
          });
        } else {
          this.validarAdd();
        }
      }
    },

    validarAdd() {
      const existe = this.verificarExistencia(this.produto.id);
      if (!existe) {
        this.addProduto();
      } else {
        this.$store.dispatch("alerta", {
          tipo: "warning",
          titulo: "Atenção!",
          texto: "Produto já adicionado",
        });
      }
    },
    verificarExistencia(id) {
      const existe = this.venda.produtos.find((item) => item.id === id); // verifica se o produto já existe na lista

      return existe;
    },

    removerItem(total, desconto, index) {
      this.decrementarTotaisVenda(total, desconto);

      this.venda.produtos.splice(index, 1);
      //this.$delete(this.venda.produtos, index)
    },

    decrementarTotaisVenda(total_produto, desconto) {
      // decrementar totais da venda

      this.venda.descontoTotal -= desconto;
      this.venda.total -= total_produto;
    },

    cadastrar: async function () {
      this.loading = true;
      this.venda.vendedor_id = this.vendedor.id;
      this.venda.empresa_id = this.empresa.id;

      await http
        .post("/vendas/cadastrar", { venda: this.venda })
        .then((response) => {
          if (response.status === 200) {
            this.loading = false;
            //this.saldo=response.data.saldo_atualizado;
            Swal.fire({
              title: "Sucesso",
              text: response.data,
              icon: "success",
              confirmButtonColor: "#3d5476",
              confirmButtonText: "Ok",
              willClose: () => {
                 //this.gerarDocPedido()
                //this.irParaListaVendas();
              },
            });
            this.erros = [];
          } else if (response.status === 201) {
            this.loading = false;
            Swal.fire({
              title: "Atenção",
              text: response.data,
              icon: "error",
              confirmButtonColor: "#3d5476",
              confirmButtonText: "Ok",
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
          this.loading = false;
        });
      //...mapActions(["listarCidades"]),
    },
    irParaListaVendas() {
      this.$inertia.get("/vendas/index");
    },

    async  enviarPedidoPorEmail(){
      this.email_loading = true;
      await http
        .post("/vendas/enviar-pedido-por-email")
        .then((response) => {
          if (response.status === 200) {
            this.email_loading = false;
            //this.saldo=response.data.saldo_atualizado;
            Swal.fire({
              title: "Sucesso",
              text: response.data,
              icon: "success",
              confirmButtonColor: "#3d5476",
              confirmButtonText: "Ok",
             
            });
            
          } else if (response.status === 201) {
            this.loading = false;
            Swal.fire({
              title: "Atenção",
              text: response.data,
              icon: "error",
              confirmButtonColor: "#3d5476",
              confirmButtonText: "Ok",
            });
          }
        })
        .catch((error) => {
          console.log(error.response);
          
            Swal.fire({
              icon: "error",
              title: "Atenção!",
              text: error.response.data,
              showConfirmButton: true,

              //timer: 1500,
            });
          
          this.email_loading = false;
        });
     

    },
     gerarDocPedido(){

     window.open("/vendas/documento-pedido");

    }
  },
};
</script>
  