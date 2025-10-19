<template>
  <div class="wrapper">
    <h5>Side Note:</h5>
    <k-writer-input class="text" ref="textbox" :marks="textField.marks" :value="content.text"
      :placeholder="textField.placeholder || 'Enter some stuff…'" @input="update({ text: $event })" />
  </div>
</template>

<script>
export default {
  computed: {
    textField() {
      return this.field("text");
    },
  },
};
</script>


<style>
.k-block-type-box .wrapper {
  background: light-dark(var(--color-gray-200), var(--color-gray-800));
  padding: var(--spacing-4);
  border-radius: var(--rounded);
} 

.k-block-type-box h5 {
  font-size: var(--text-xs);
  margin-bottom: var(--spacing-2);
  font-weight: 700;
  text-transform: uppercase;
}

.k-block-type-box .text {
  font-size: var(--text-sm);
  line-height: var(--leading-normal);
}

.k-block-type-box .text div {
  padding: 0;
}
</style>