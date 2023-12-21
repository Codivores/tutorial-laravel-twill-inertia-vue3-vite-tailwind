<script setup lang="ts">
import Head from '@Theme/Head.vue'

interface Props {
  item: Model.Page
}

defineProps<Props>()

const BlockCommonButton = defineAsyncComponent(() => import('@Block/Common/Button.vue'))
const BlockCommonImage = defineAsyncComponent(() => import('@Block/Common/Image.vue'))
const BlockCommonSeparator = defineAsyncComponent(() => import('@Block/Common/Separator.vue'))
const BlockCommonText = defineAsyncComponent(() => import('@Block/Common/Text.vue'))
const BlockCommonTitle = defineAsyncComponent(() => import('@Block/Common/Title.vue'))
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
      <BlockCommonText
        v-if="block.type == 'common-text'"
        :block="block"
      ></BlockCommonText>
      <BlockCommonImage
        v-if="block.type == 'common-image'"
        :block="block"
      ></BlockCommonImage>
      <BlockCommonButton
        v-if="block.type == 'common-button'"
        :block="block"
      ></BlockCommonButton>
      <BlockCommonTitle
        v-if="block.type == 'common-title'"
        :block="block"
      ></BlockCommonTitle>
      <BlockCommonSeparator v-else-if="block.type == 'common-separator'"></BlockCommonSeparator>
    </div>
  </div>
</template>
