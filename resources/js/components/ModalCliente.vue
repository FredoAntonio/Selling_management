<template>
  <div data-app>
    <template>
      <v-row justify="center">
        <v-dialog v-model="dialog" max-width="600px">
          <template v-slot:activator="{ on, attrs }">
            <v-fab-transition>
              <v-btn
                color="pink"
                dark
                absolute
                top
                right
                fab
                small
                v-bind="attrs"
                v-on="on"
                style="background-color: #007bff"
                @click="verCliente(cliente_id)"
              >
                <v-icon>mdi-eye</v-icon>
              </v-btn>
            </v-fab-transition>
          </template>
          <v-card>
            <v-card-title>
              <span class="text-h6">Detalhes do cliente</span>
            </v-card-title>
            <v-card-text>
                

              <ul style="list-style: none">
                <li>
                  <b>Nome Fantasia:&nbsp;&nbsp; &nbsp;</b> {{ cliente.nome_fantasia }}
                </li>
                <li>
                  <b>Endereço:&nbsp;&nbsp; &nbsp;</b> {{ cliente.endereco }}
                </li>
                <li>
                  <b>Cidade:&nbsp;&nbsp; &nbsp;</b>
                  {{
                    cliente.cidade
                      ? cliente.cidade.cidade_nome
                      : "sem registro"
                  }}
                </li>

                <li>
                  <b>Bairro:&nbsp;&nbsp; &nbsp;</b>
                  {{ cliente.bairro }}
                </li>
                <li>
                  <b>Inscrição Est.:&nbsp;&nbsp; &nbsp;</b>
                  {{ cliente.inscricao_estadual  }}
                </li>
                <li>
                  <b>CNPJ:&nbsp;&nbsp; &nbsp;</b>
                  {{ cliente.cnpj  }}
                </li>
                <li>
                  <b>Telefone:&nbsp;&nbsp; &nbsp;</b>
                  {{
                    cliente.telefone
                   
                  }}
                </li>
               
                <li>
                  <b>CEP:&nbsp;&nbsp; &nbsp;</b>
                  {{
                    cliente.cep
                   
                  }}
                </li>
               
              </ul>
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
      </v-row>
    </template>
  </div>
</template>



<script>
import { mapGetters, mapActions } from "vuex";
export default {
  props: {
    cliente_id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      dialog: false,

      selectedItem: 1,
      items: [
        { text: "Real-Time", icon: "mdi-clock" },
        { text: "Audience", icon: "mdi-account" },
        { text: "Conversions", icon: "mdi-flag" },
      ],

      cliente: {},
    };
  },
  mounted() {
    this.listarClientes();
  },
  computed: {
    ...mapGetters(["clientes"]),
  },
  methods: {
    ...mapActions(["listarClientes"]),

    verCliente(id) {
      this.cliente = {};
      this.cliente = this.clientes.find((cliente) => cliente.id == id);
    },
  },
};
</script>