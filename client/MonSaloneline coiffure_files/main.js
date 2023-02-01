/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Components
import App from '/src/App.vue'

// Composables
import { createApp } from '/node_modules/.vite/deps/vue.js?v=39b9d3f9'

// Plugins
import { registerPlugins } from '/src/plugins/index.js?t=1675263637881'

const app = createApp(App)

registerPlugins(app)

app.mount('#app')
