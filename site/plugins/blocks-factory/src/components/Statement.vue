<template>
  <div class="wrapper">
    <k-writer-input class="text" ref="textbox" :marks="statementField.marks" :value="content.text"
      :placeholder="statementField.placeholder || 'Enter some stuff…'" @input="update({ text: $event })" />
  </div>

</template>

<script>
export default {
  computed: {
    statementField() {
      return this.field("text");
    },
  },
};
</script>


<style>
.k-block-type-statement .wrapper {
  background: var(--color-primary);
  padding: var(--spacing-4);
  border-radius: var(--rounded);
}

.k-block-type-statement .text {
  color: var(--color-white);
  font-size: var(--text-2xl);
}

.k-block-type-statement .k-writer[data-placeholder][data-empty]::before {
  color: var(--color-white);
  opacity: 0.5;
}
</style>