<script setup lang="ts">
defineOptions({
  name: 'LayoutDefault',
})
</script>

<template>
  <div class="min-h-full">
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">My Application</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl py-6">
        <slot></slot>
      </div>
    </main>
  </div>
</template>
