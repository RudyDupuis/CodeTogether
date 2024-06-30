<script setup lang="ts">
import { ref } from 'vue'

interface FormProps {
  onSubmit: () => void
  isFormValid: boolean
  isRequiredFieldCompleted: boolean
  classValue: string
  errorMessage: string
}

const props = defineProps<FormProps>()
const showRequiredFieldsMessage = ref(false)

const handleSubmit = () => {
  showRequiredFieldsMessage.value = true

  if (props.isFormValid) {
    props.onSubmit()
  }
}
</script>

<template>
  <form @submit.prevent="handleSubmit" :class="'f-col a-cent ' + classValue">
    <slot></slot>
    <p
      v-if="showRequiredFieldsMessage && !isRequiredFieldCompleted"
      class="txt-error"
      data-cy="form-required-fields-error-message"
    >
      Not all required fields are completed
    </p>
    <p v-if="errorMessage" class="txt-error" data-cy="form-error-message">{{ errorMessage }}</p>
  </form>
</template>

<style scoped>
p {
  margin-top: 8px;
}
</style>
