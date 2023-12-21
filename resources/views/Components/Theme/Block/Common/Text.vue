<script setup lang="ts">
defineOptions({
  name: 'BlockCommonText',
})

interface Props {
  block: Model.Block & PropsBlock
}

type PropsBlock = {
  content: {
    content?: string | null
  }
}

defineProps<Props>()
</script>

<template>
  <div
    v-if="block.content?.content"
    v-html="block.content.content"
    class="text-gray-700 text-justify [&>p]:pb-4"
  ></div>
</template>
