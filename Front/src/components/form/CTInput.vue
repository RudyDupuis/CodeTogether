<script setup lang="ts">
defineProps<{
  type: string
  placeholder: string
  errorMessage?: string
  errorDisplay: boolean
  marginBottom: string
  dataCy: string
}>()

const value = defineModel()
</script>

<template>
  <div :class="'f-col a-cent ' + marginBottom">
    <input v-model="value" :type="type" :placeholder="placeholder" :data-cy="dataCy" />
    <p v-if="!errorDisplay" class="txt-error" :data-cy="dataCy + '-error'">{{ errorMessage }}</p>
  </div>
</template>

<style scoped>
p {
  margin-top: 8px;
  max-width: 280px;
  text-align: center;
}
</style>
