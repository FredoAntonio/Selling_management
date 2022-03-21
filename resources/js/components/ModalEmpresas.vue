<template>
  <div data-app>
    <template>
      <!-- <div v-if="dialog">
      <v-overlay :value="loading"></v-overlay>
      <div class="text-center" v-if="loading" style="z-index: 1;">
          <v-progress-circular
            indeterminate
            color="primary"
          ></v-progress-circular>
        </div>
        </div> -->
      <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
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
              <span class="text-h6">Selecione a empresa</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12">
                    <v-autocomplete
                      :items="empresas"
                      label="Empresa"
                      v-model="empresa1"
                      item-text="nome"
                       return-object
                    ></v-autocomplete>
                  </v-col>
                </v-row>
              </v-container>
              <!--   <small>*indicates required field</small> -->
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue darken-1"
                text
                @click="fecharModal"
                class="botao-default-danger"
              >
                Fechar
              </v-btn>
              <v-btn
                color="blue darken-1"
                text
                @click="confirmar"
                class="botao-default-primary"
              >
                Confirmar
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
  data() {
    return {
      dialog: true,
      empresa1: {id:""},
      loading: true,
    };
  },
  mounted() {
    this.listarEmpresas();
    
  },
  computed: {
    ...mapGetters(["empresas"]),
  },
  methods: {
    ...mapActions(["listarEmpresas", "salvaEmpresa", "goBack", "alerta"]),

    confirmar: function () {
      // lanca o id da empresa selecionada

      if (this.empresa1.id == "") {
        this.$store.dispatch('alerta',{ 
          tipo:"warning",
          titulo: "Atenção!",
          texto:"Por favor selecione uma empresa",}
         
        );
        //this.alerta("warning","Atenção", "Selecione uma empresa");
        //return 0;
      } else {
       
        this.salvaEmpresa(this.empresa1);
        this.dialog = false;
      }

      //this.$inertia.get("/vendas/criar");
    },
    fecharModal: function () {
      // lanca o id da empresa selecionada
      this.empresa1 = {};
      this.dialog = false;
      this.goBack();
    },
  },
};
</script>