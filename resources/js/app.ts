import { createApp, h, type DefineComponent } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

import '../css/app.css'

createInertiaApp({
  resolve: async (name: string) => {
    let page = await resolvePageComponent(`../views/Pages/${name}.vue`, import.meta.glob<DefineComponent>('../views/Pages/**/*.vue'))

    page = page.default

    page.layout = (await import(`../views/Components/Layout/${page.layoutName || 'Default'}.vue`)).default

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
