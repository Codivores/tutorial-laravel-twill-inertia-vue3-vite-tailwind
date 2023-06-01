<script setup lang="ts">
import Head from '@Theme/Head.vue'

defineOptions({
  name: 'PageHome',
})

interface Props {
  item: Model.Page
}

defineProps<Props>()
</script>

<template>
  <Head :item="item"></Head>
  <h1 class="text-center text-4xl font-semibold text-gray-900">
    {{ item.title }}
  </h1>
</template>
