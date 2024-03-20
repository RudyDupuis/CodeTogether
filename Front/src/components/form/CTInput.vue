<script setup lang="ts">
import { computed } from 'vue'

interface Props {
  modelValue: string | undefined
  type: string
  placeholder: string
  errorMessage?: string
  errorDisplay: boolean
  marginBottom: string
}

const props = defineProps<Props>()

const emit = defineEmits<{
  'update:modelValue': [value: string | undefined]
}>()

const value = computed({
  get() {
    return props.modelValue
  },
  set(value) {
    emit('update:modelValue', value)
  }
})
</script>

<template>
  <div :class="'f-col a-cent ' + marginBottom">
    <input v-model="value" :type="type" :placeholder="placeholder" />
    <p v-if="errorDisplay" class="txt-error">{{ errorMessage }}</p>
  </div>
</template>

<style scoped>
p {
  margin-top: 8px;
  max-width: 250px;
  text-align: center;
}
</style>
