<script setup lang="ts">
import Head from '@Theme/Head.vue'

interface Props {
  item: Model.Page
}

defineProps<Props>()

const BlockCommonTitle = defineAsyncComponent(() => import('@Block/Common/Title.vue'))
const BlockCommonSeparator = defineAsyncComponent(() => import('@Block/Common/Separator.vue'))
</script>

<template>
  <Head :item="item"></Head>

  <div
    v-if="item?.blocks && Array.isArray(item.blocks) && item.blocks.length > 0"
    class="mx-auto w-full max-w-6xl"
  >
    <div
      v-for="(block, index) in item.blocks"
      :key="index"
    >
      <BlockCommonTitle
        v-if="block.type == 'common-title'"
        :block="block"
      ></BlockCommonTitle>
      <BlockCommonSeparator v-else-if="block.type == 'common-separator'"></BlockCommonSeparator>
    </div>
  </div>
</template>
