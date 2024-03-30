<template>
  <figure class="wrapper" v-if="video.url">
    <video>
      <source :src="video.url" type="video/mp4">
    </video>
    <figcaption>{{ content.caption }}</figcaption>
  </figure>

  <figure v-else class="k-block-figure">
    <button type="button" class="k-button k-block-figure-empty" @click="open">
      <span aria-hidden="true" class="k-button-icon k-icon k-icon-video">
        <svg viewBox="0 0 16 16">
          <use xlink:href="#icon-video"></use>
        </svg>
      </span>
      <span class="k-button-text"> Chose a video file … </span>
    </button>
  </figure>
</template>

<script>
export default {
  computed: {
    video() {
      return this.content.video[0] || {};
    },
  },
};
</script>


<style>
.k-block-type-video-self .wrapper,
.k-block-type-video-self video {
  max-width: 100%;
  height: auto;
}

.k-block-type-video-self figcaption {
  padding-top: var(--spacing-2);
  color: var(--color-gray-600);
  font-size: var(--text-sm);
  text-align: center;
}
</style>