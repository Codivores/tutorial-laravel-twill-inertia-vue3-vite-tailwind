import { ConfigEnv, defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig(({ command }: ConfigEnv) => {
  return {
    base: command === 'build' ? '/dist/' : '',
    publicDir: "disable",
    build: {
      manifest: true,
      outDir: "public/dist",
      rollupOptions: {
        input: {
          app: "resources/js/app.ts",
        },
      },
    },
    server: {
      strictPort: true,
      port: 3030,
      // https: true,
      hmr: {
        host: "localhost",
      },
    },
    plugins: [
      vue()
    ],
    optimizeDeps: {
      include: [
        "@inertiajs/inertia",
        "@inertiajs/inertia-vue3",
        "axios",
        "vue"
      ],
    },
  }
})
