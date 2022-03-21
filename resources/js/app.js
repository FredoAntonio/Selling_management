import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import vuetify from './plugins/vuetify' // path to vuetify export
import store from './store'

Vue.filter('formatCurrency', function (value) {
  
    let val = (value / 1).toFixed(2).replace(".", ",");
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  
})


createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    new Vue({
        vuetify,
        store,
        render: h => h(App, props),
    }).$mount(el)
  },
})

