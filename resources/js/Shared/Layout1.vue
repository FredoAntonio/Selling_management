<template>
  <v-app id="inspire">
    <v-system-bar app >
      <v-spacer></v-spacer>

      <v-icon>mdi-square</v-icon>

      <v-icon>mdi-circle</v-icon>

      <v-icon>mdi-triangle</v-icon>
    </v-system-bar>
  
    <v-navigation-drawer
      v-model="drawer"
      app
      
    >
      <v-sheet
        color="grey lighten-4"
        class="pa-4"
      >
        <v-avatar
          class="mb-4"
          color="grey darken-1"
          size="64"
        ></v-avatar>

        <div>john@vuetifyjs.com</div>
      </v-sheet>

      <v-divider></v-divider>

      <v-list>
        <Link href="/home">
        <v-list-item
         
          link
        >
          <v-list-item-icon>
         <v-icon>mdi-home-city</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>Homes</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </Link>
      </v-list>
      <v-list>
        <Link href="/conta">
        <v-list-item
         
          link
        >
          <v-list-item-icon>
         <v-icon>mdi-account</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>Conta</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        </Link>
      </v-list>
    </v-navigation-drawer>

    <v-main>
      <v-container
        class="py-8 px-6"
        fluid
      >
          <slot />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue'
  export default {
     components: {
    Link,
  },
    data: () => ({
      cards: ['Today', 'Yesterday'],
      drawer: null,
      links: [
        ['mdi-inbox-arrow-down', 'home'],
        ['mdi-send', 'conta'],
        ['mdi-delete', 'Trash'],
        ['mdi-alert-octagon', 'Spam'],
      ],
    }),
  }
</script>
