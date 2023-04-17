<script setup lang="ts">
defineOptions({
  name: 'PageContent',
  layoutName: 'Default',
})

interface Props {
  item: Model.Page
}

defineProps<Props>()
</script>

<template>
  <h1 class="text-center text-4xl font-semibold text-gray-900">
    {{ item.title }}
  </h1>
</template>
