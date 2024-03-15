import { createApp } from 'vue'
import App from './App.vue'

import router from './router'

import { createVuetify } from 'vuetify'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'

const app = createApp(App)

app.use(router)

app.use(
  createVuetify({
    theme: {
      defaultTheme: 'dark'
    }
  })
)

app.mount('#app')
