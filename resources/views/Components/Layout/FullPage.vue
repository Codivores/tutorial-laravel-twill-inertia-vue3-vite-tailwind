<script setup lang="ts">
defineOptions({
  name: 'LayoutFullPage',
})
</script>

<template>
  <main class="w-full flex flex-col h-screen content-center justify-center">
    <slot></slot>
  </main>
</template>
