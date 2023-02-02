import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

loadFonts()

import './assets/main.css';

createApp(App)
  .use(router)
  .use(vuetify)
  .use(VueSweetalert2)
  .use(VueAxios, axios)
  .mount('#app')
