<script setup lang="ts">
import { Head as InertiaHead } from '@inertiajs/vue3'

defineOptions({
  name: 'ThemeHead',
})

interface Props {
  item?: any
  title?: string
  description?: string
}

const props = withDefaults(defineProps<Props>(), {
  item: () => ({}),
  title: '',
  description: '',
})

const appName = 'My Application'

const title =
  props.item && props.item.meta_title && props.item.meta_title != ''
    ? props.item.meta_title
    : props.item && props.item.title && props.item.title != ''
    ? props.item.title
    : props.title

const description =
  props.item && props.item.meta_description && props.item.meta_description != ''
    ? props.item.meta_description
    : props.item && props.item.description && props.item.description != ''
    ? props.item.description
    : props.description
</script>

<template>
  <InertiaHead :title="title ? `${title} | ${appName}` : appName">
    <meta
      head-key="description"
      name="description"
      :content="description"
    />
  </InertiaHead>
</template>
