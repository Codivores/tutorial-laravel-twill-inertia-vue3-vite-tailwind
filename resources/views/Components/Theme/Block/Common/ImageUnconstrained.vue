<script setup lang="ts">
import Picture from '@Theme/UI/Picture.vue'

defineOptions({
  name: 'BlockCommonImageUnconstrained',
})

interface Props {
  block: Model.Block & PropsBlock
}

type PropsBlock = {
  medias: {
    common_unconstrained_image?: Model.MediaWithRoles
  }
}

defineProps<Props>()
</script>

<template>
  <div
    v-if="block?.medias?.common_unconstrained_image?.default"
    class="my-4"
  >
    <Picture
      :media="block.medias.common_unconstrained_image.default"
      class="w-full"
    ></Picture>
  </div>
</template>
