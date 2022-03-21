<template>
  <Layout>
    <div class="content-wrapper" >
     
      <v-card>
        <v-card-title>
          <v-toolbar-title>{{ titulo }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Pesquisar"
            single-line
            hide-details
          ></v-text-field>

          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <Link href="/clientes/criar" class="nav-link" 
            ><button class="btn btn-primary">Novo Cliente</button></Link
          >
          <!--  <template>
            <v-btn
              color="primary"
              dark
              class="mb-2"
              style="background-color: #007fbb!important;"
            
            >
             Novo Cliente
            </v-btn>
          </template> -->
        </v-card-title>

        <v-data-table :headers="headers" :items="clientes" :search="search">
          <template v-slot:item.actions="{ item }">
            <button class="btn btn-warning">Editar</button></template
          >
        </v-data-table>
      </v-card>
    </div>
  </Layout>
</template>

<script>
import Layout from "../../Shared/Layout";
import { Head } from "@inertiajs/inertia-vue";
import { Link } from "@inertiajs/inertia-vue";
//import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    Head,
    Layout,
    Link,
  },
   props: {
    clientes: {
      type: Array,
      required: true,
    },
    
  }, 
  data() {
    return {
      titulo: "Lista de clientes",
      search: "",
      headers: [
        /*  {
            text: 'Dessert (100g serving)',
            align: 'start',
            filterable: false,
            value: 'name',
          }, */
        { text: "Codigo", value: "id" },
        { text: "Cnpj", value: "cnpj" },
        { text: "Razão Social", value: "rzsocial" },
        { text: "Nome Fantasia", value: "nome_fantasia" },
        { text: "Cidade", value: "cidade.cidade_nome" },
        { text: "Telefone", value: "telefone" },
        { text: "Celular", value: "celular" },
        { text: "Opções", value: "actions", sortable: false, align: "center" },
      ],

      //clientes: [],
    };
  },

  mounted() {
//$('.content-wrapper').PushMenu()
  },
/*    created() {
$('.content-wrapper').PushMenu()
  },
   updated() {
$('.content-wrapper').PushMenu()
  },
   */
  computed:{
 //...mapGetters(["clientes"])
  

  }, 

  methods: {

 //...mapActions(["listarClientes"]),
    /* 
     listarClientes: function () {
      
      this.$store.dispatch('listarClientes')
    
     
    },  */
  },
};
</script>
  