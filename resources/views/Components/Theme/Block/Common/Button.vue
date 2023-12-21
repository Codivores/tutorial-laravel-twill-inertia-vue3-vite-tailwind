<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

defineOptions({
  name: 'BlockCommonButton',
})

interface Props {
  block: Model.Block & PropsBlock
}

type PropsBlock = {
  content: {
    label?: string | null
    url?: string | null
    type?: string | null
  }
}

const props = defineProps<Props>()

const classes = computed(() =>
  (props.block?.content?.type == 'cta'
    ? 'bg-teal-600 hover:bg-teal-800 uppercase'
    : 'bg-gray-500 hover:bg-gray-700'
  ).concat(' rounded px-5 py-3 font-bold text-white')
)
</script>

<template>
  <div
    v-if="block.content?.url && block.content?.label"
    class="flex justify-center my-2"
  >
    <template v-if="block.content.url?.startsWith('http')">
      <a
        :href="block.content.url"
        target="_blank"
      >
        <button :class="classes">
          {{ block.content.label }}
        </button>
      </a>
    </template>
    <template v-else>
      <Link :href="block.content.url">
        <button :class="classes">
          {{ block.content.label }}
        </button>
      </Link>
    </template>
  </div>
</template>
