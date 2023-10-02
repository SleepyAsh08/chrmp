<template>
  <div :class="$attrs.class">
    <label v-if="label" for="id">{{ label }}:</label>
    <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="form-control" :class="{ error: error }"
      :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
    <div class="fs-6 c-red-500">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from 'uuid'

export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    error: String,
    label: String,
    modelValue: String,
  },
  mounted() {
    if (this.$attrs.isFocused) {
      this.focus()
    }
  },
  emits: ['update:modelValue'],
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end)
    },
  },
}
</script>
