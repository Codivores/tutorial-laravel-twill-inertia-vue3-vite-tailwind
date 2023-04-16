<script setup lang="ts">
interface Props {
  item: Model.Page
}

defineProps<Props>()
</script>

<template>
  <div class="bg-gray-200 w-full h-screen flex flex-col justify-center items-center">
    <h1 class="text-center text-4xl font-semibold text-gray-900">
      {{ item.title }}
    </h1>
  </div>
</template>
