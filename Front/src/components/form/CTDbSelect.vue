<script setup lang="ts">
import { ref, watch } from 'vue'
import CrossButton from '../svg/CrossButton.vue'

/***** Interfaces ******/
export interface DbSelectValues {
  firstValue: Choice
  secondValue: Choice
}

export interface Choice {
  value: any
  title: string
}

interface DbSelectProps {
  modelValue: Array<DbSelectValues> | undefined
  firstSelectTitle: string
  secondSelectTitle: string
  firstSelectChoices: Array<Choice>
  secondSelectChoices: Array<Choice>
  errorDisplay: boolean
  errorMessage?: string
  marginBottom?: string
}

/***** Variables ******/
const props = defineProps<DbSelectProps>()
const selectedValues = ref<Array<DbSelectValues>>([])
const filteredFirstSelectChoices = ref<Array<Choice>>([])

const emit = defineEmits<{
  'update:modelValue': [value: Array<DbSelectValues>]
}>()

/***** Functions ******/
function addFirstSelectedValue(event: Event) {
  const target = event.target as HTMLSelectElement
  const selectedOption = filteredFirstSelectChoices.value[target.selectedIndex - 1]
  selectedValues.value.push({
    firstValue: selectedOption,
    secondValue: { value: '', title: '' }
  })
  emit('update:modelValue', selectedValues.value)
  filteredFirstSelectChoices.value.splice(target.selectedIndex - 1, 1)
  target.selectedIndex = 0
}

function removeFirstSelectedValue(value: Choice) {
  const index = selectedValues.value.findIndex((val) => val.firstValue.value === value.value)
  if (index !== -1) {
    selectedValues.value.splice(index, 1)
    filteredFirstSelectChoices.value.push(value)
  }
  emit('update:modelValue', selectedValues.value)
}

function addSecondSelectedValue(event: Event, value: DbSelectValues) {
  const target = event.target as HTMLSelectElement
  const selectedOption = props.secondSelectChoices[target.selectedIndex - 1]
  if (selectedOption) {
    value.secondValue = selectedOption
  }
  emit('update:modelValue', selectedValues.value)
}

/***** Executed Code ******/
watch(
  () => props.firstSelectChoices,
  (newValue) => {
    filteredFirstSelectChoices.value = [...newValue]
  },
  { immediate: true, deep: true }
)
watch(
  () => props.modelValue,
  (newValue) => {
    if (newValue) {
      selectedValues.value = [...newValue]
    }
  },
  { immediate: true, deep: true }
)
</script>

<template>
  <section :class="marginBottom">
    <select class="mb-8" @change="addFirstSelectedValue" data-cy="ct-db-select">
      <option disabled selected>{{ firstSelectTitle }}</option>
      <option
        v-for="choice in filteredFirstSelectChoices"
        :key="choice.title"
        :value="choice.value"
      >
        {{ choice.title }}
      </option>
    </select>
    <ul v-if="selectedValues.length > 0" class="bg-light-shadow-input br-5 input-width p-8-16">
      <li
        v-for="(value, index) in selectedValues"
        :key="value.firstValue.title"
        class="txt-dark f a-cent j-betw"
      >
        {{ value.firstValue.title }}
        <div class="f a-cent">
          <select
            class="secondSelect"
            @change="addSecondSelectedValue($event, value)"
            :data-cy="'ct-second-select-' + index"
          >
            <option disabled selected>{{ secondSelectTitle }}</option>
            <option v-for="choice in secondSelectChoices" :key="choice.title" :value="choice.value">
              {{ choice.title }}
            </option>
          </select>
          <cross-button @click="removeFirstSelectedValue(value.firstValue)" class="ml-8" />
        </div>
      </li>
    </ul>
    <p v-if="!errorDisplay" class="txt-error">{{ errorMessage }}</p>
  </section>
</template>

<style scoped>
.secondSelect {
  padding: 4px 12px;
  width: fit-content;
  box-shadow:
    2px 2px 2px 0 rgba(28, 27, 32, 0.25),
    inset 2px 2px 2px 0 rgba(28, 27, 32, 0.25);
}

li {
  border-bottom: 2px solid rgb(235, 235, 235);
  padding: 4px 0;
}

p {
  margin-top: 8px;
  max-width: 280px;
  text-align: center;
}
</style>
