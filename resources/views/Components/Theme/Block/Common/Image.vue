<script setup lang="ts">
import Picture from '@Theme/UI/Picture.vue'

defineOptions({
  name: 'BlockCommonImage',
})

interface Props {
  block: Model.Block & PropsBlock
}

type PropsBlock = {
  medias: {
    common_image?: Model.MediaWithRoles
  }
}

defineProps<Props>()
</script>

<template>
  <div
    v-if="block?.medias?.common_image"
    class="my-4"
  >
    <Picture
      :mediaList="block.medias.common_image"
      class="w-full"
    ></Picture>
  </div>
</template>
