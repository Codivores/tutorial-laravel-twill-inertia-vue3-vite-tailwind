<script setup lang="ts">
defineOptions({
  name: 'BlockSandboxPricingTable',
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
  childs: PropsChildBlock[]
}

type PropsChildBlock = {
  content: {
    name?: string | null
    price?: string | null
    description?: string | null
  }
}

defineProps<Props>()

/**
 * Tailwind dynamic classes.
 * opacity-60
 * opacity-80
 * opacity-100
 */
</script>

<template>
  <div
    v-if="block?.childs && Array.isArray(block.childs) && block.childs.length > 0"
    class="w-full bg-blue pt-8"
  >
    <h1
      v-if="block.content?.title"
      v-html="block.content.title"
      class="text-center text-4xl font-semibold text-gray-900 mb-8"
    ></h1>

    <div class="flex justify-center">
      <template
        v-for="(child, index) in block.childs"
        :key="index"
      >
        <div
          v-if="child.content?.name && child.content?.price"
          class="w-full px-3"
        >
          <div
            class="bg-teal-500 rounded-lg"
            :class="`opacity-${(3 + index) * 20}`"
          >
            <div class="py-3 block text-3xl text-center font-semibold">
              {{ child.content.name }}
            </div>

            <h2 class="mb-6 font-bold text-center">
              <span class="text-4xl">${{ child.content.price }}</span>
              <span class="text-gray-600"> / month </span>
            </h2>

            <p
              v-if="child.content?.description"
              v-html="child.content.description"
              class="border-t border-stroke py-6 mx-6"
            ></p>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>
