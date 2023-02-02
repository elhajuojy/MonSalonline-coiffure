import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'
import axios from 'axios'
import VueAxios from 'vue-axios'

loadFonts()

import './assets/main.css';

createApp(App)
  .use(router)
  .use(vuetify)
  .use(VueAxios, axios)
  .mount('#app')
