<script setup lang="ts">
import Text from './Text.vue'

defineOptions({
  name: 'BlockCommonParagraph',
})

interface Props {
  block: Model.Block & PropsBlock
}

type PropsBlock = {
  content: {
    title?: string | null
    subtitle?: string | null
    content?: string | null
  }
}

defineProps<Props>()
</script>

<template>
  <div
    v-if="block?.content?.title || block?.content?.subtitle || block?.content?.content"
    class="my-4"
  >
    <h2
      v-if="block?.content?.title"
      v-html="block.content.title"
      class="text-2xl font-bold mb-1"
    ></h2>
    <h2
      v-if="block?.content?.subtitle"
      v-html="block.content.subtitle"
      class="text-xl font-semibold mb-1"
    ></h2>
    <Text
      v-if="block?.content?.content"
      :block="block"
    ></Text>
  </div>
</template>
