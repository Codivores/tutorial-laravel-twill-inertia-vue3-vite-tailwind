import { createApp, h } from "vue"
import { App, plugin as inertiaPlugin } from "@inertiajs/inertia-vue3"
import "vite/dynamic-import-polyfill"

import '../css/app.css'

const el = document.getElementById("app")!

createApp({
  render: () =>
    h(App, {
      initialPage: JSON.parse(el.dataset.page!),
      resolveComponent: async (name: string) => {
        const page = (await import(`./Pages/${name}.vue`)).default
        return page
      },
    }),
})
  .use(inertiaPlugin)
  .mount(el)
