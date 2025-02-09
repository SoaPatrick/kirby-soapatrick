import { resolve } from 'path'
import kirby from "vite-plugin-kirby";
import { svelte } from "@sveltejs/vite-plugin-svelte";

export default ({ mode }) => ({
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler',
      },
    },
  },

  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: { input: resolve(process.cwd(), 'src/index.js') }
  },

  plugins: [kirby(), svelte()],
});
