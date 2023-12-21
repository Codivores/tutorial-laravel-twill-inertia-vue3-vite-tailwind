<script setup lang="ts">
defineOptions({
  name: 'BlockCommonTitle',
})

interface Props {
  block: Model.Block & PropsBlock
}

type PropsBlock = {
  content: {
    title?: string | null
  }
}

defineProps<Props>()
</script>

<template>
  <h1
    v-if="block.content?.title"
    v-html="block.content.title"
    class="text-center text-4xl font-semibold text-gray-900"
  ></h1>
</template>
