import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import { createPinia } from 'pinia'
loadFonts()

const pinia = createPinia()

import './assets/main.css';

createApp(App)
  .use(router)
  .use(pinia)
  .use(vuetify)
  .use(VueSweetalert2)
  .use(VueAxios, axios)
  .mount('#app')
