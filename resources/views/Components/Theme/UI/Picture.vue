<script setup lang="ts">
defineOptions({
  name: 'ThemeUiPicture',
  inheritAttrs: false,
})

interface Props {
  media?: Model.Media | null
  mediaList?: Model.MediaWithRoles | null
  sizes?: number | object | null
  lazy?: boolean
  caption?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  media: null,
  mediaList: null,
  lazy: false,
  caption: false,
})

const extensionList = ['webp', 'jpg']

const sizes =
  props.sizes && typeof props.sizes == 'number'
    ? {
        mobile: props.sizes,
        tablet: props.sizes,
        desktop: props.sizes,
        default: props.sizes,
      }
    : Object.assign(
        {
          mobile: 768,
          tablet: 1024,
          desktop: 1536,
          default: 1536,
        },
        props.sizes
      )

const figure = computed(() => {
  if (props.mediaList !== null && props.mediaList?.mobile && props.mediaList?.tablet && props.mediaList?.desktop) {
    return {
      sources: [
        {
          crop: 'mobile',
          object: props.mediaList.mobile,
          size: sizes.mobile,
          media: '(max-width: 768px)',
        },
        {
          crop: 'tablet',
          object: props.mediaList.tablet,
          size: sizes.tablet,
          media: '(max-width: 1024px)',
        },
        {
          crop: 'desktop',
          object: props.mediaList.desktop,
          size: sizes.desktop,
          media: '(min-width: 1025px)',
        },
      ],
      caption:
        props.caption && props.mediaList.desktop?.caption && props.mediaList.desktop.caption !== ''
          ? props.mediaList.desktop.caption
          : null,
    }
  } else if (props.media) {
    return {
      sources: [
        {
          crop: 'default',
          object: props.media,
          size: sizes.default,
          media: '(min-width: 1px)',
        },
      ],
      caption: props.caption && props.media?.caption && props.media.caption !== '' ? props.media.caption : null,
    }
  }

  return null
})
</script>

<template>
  <figure class="w-full h-auto">
    <template v-if="figure && figure.sources">
      <picture>
        <template
          v-for="(media, index) in figure.sources"
          :key="index"
        >
          <template v-if="media.object && media.object.src">
            <source
              v-for="imageFormat in extensionList"
              :srcset="`${media.object.src}&fm=webp&w=${media.size}`"
              :media="media.media"
              :type="`image/${imageFormat}`"
            />
            <img
              v-if="index == figure.sources.length - 1"
              :src="`${media.object.src}&fm=webp&w=${media.size}`"
              :alt="media.object?.alt"
              v-bind="$attrs"
              :loading="lazy ? 'lazy' : 'eager'"
              class=""
            />
          </template>
        </template>
      </picture>
      <template v-if="caption && figure.caption !== null">
        <figcaption class="w-full text-xs text-center py-1">
          {{ figure.caption }}
        </figcaption>
      </template>
    </template>
  </figure>
</template>
