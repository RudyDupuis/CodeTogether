<script setup lang="ts">
import LogoTitle from '@/components/svg/LogoTitle.vue'
import CTForm from '@/components/form/CTForm.vue'
import CTInput from '@/components/form/CTInput.vue'
import type { DbSelectValues, Choice } from '@/components/form/CTDbSelect.vue'
import CTDbSelect from '@/components/form/CTDbSelect.vue'
import CTDotLoader from '@/components/loader/CTDotLoader.vue'
import { useRouter } from 'vue-router'
import type { User } from '@/entities/User'
import type { Profile, SpecialityLevel } from '@/entities/Profile'
import { ref } from 'vue'
import {
  MAIL_ERROR_MESSAGE,
  MAIL_REGEX,
  PASSWORD_ERROR_MESSAGE,
  PASSWORD_REGEX,
  validationMethods
} from '@/helpers/form/Validation'
import { ApiMethods } from '@/helpers/entities/ApiMethods'
import type { Speciality } from '@/entities/Speciality'

/***** Variables ******/
const router = useRouter()
const apiMethods = new ApiMethods()

const user = ref<Partial<User>>({})
const profile = ref<Partial<Profile>>({})
const firstChoiceSpecialityList = ref<Array<Choice>>([])
const specialityLevelList = ref<Array<Partial<SpecialityLevel>>>([])

const rawSpecialityLevelValues = ref<Array<DbSelectValues>>()

const isFormValid = ref(false)
const isRequiredFieldCompleted = ref(false)
const isMailValid = ref(true)
const isSpecialitiesValid = ref(true)
const isPasswordValid = ref(true)

const errorMessage = ref('')
const isFormLoading = ref(true)

/***** Functions ******/
function checkIfFormValid() {
  isSpecialitiesValid.value = checkAndMakeSpecialityLevel()
  isRequiredFieldCompleted.value =
    validationMethods.validateRequiredFields(user.value, ['email', 'password']) &&
    validationMethods.validateRequiredFields(profile.value, ['pseudo']) &&
    specialityLevelList.value.length > 0
  isMailValid.value = validationMethods.validateFieldsWithRegex(user.value.email, MAIL_REGEX)
  isPasswordValid.value = validationMethods.validateFieldsWithRegex(
    user.value.password,
    PASSWORD_REGEX
  )

  isFormValid.value =
    isRequiredFieldCompleted.value &&
    isMailValid.value &&
    isPasswordValid.value &&
    isSpecialitiesValid.value
}

function checkAndMakeSpecialityLevel(): boolean {
  let isValid = true

  rawSpecialityLevelValues.value?.forEach((raw) => {
    if (raw.secondValue.value) {
      specialityLevelList.value.push({
        speciality: '/api/specialities/' + raw.firstValue.value,
        level: raw.secondValue.value
      })
    } else {
      isValid = false
    }
  })

  return isValid
}

async function registerRequest() {
  errorMessage.value = ''
  isFormLoading.value = true
  user.value.roles = ['ROLE_USER']
  profile.value.specialityList = specialityLevelList.value
  user.value.profile = profile.value

  const registerResponse = await apiMethods.postData('register', user.value)

  if (registerResponse.id) {
    const authResponse = await apiMethods.postData('auth', {
      email: user.value.email,
      password: user.value.password
    })

    if (authResponse.token) {
      localStorage.setItem('token', authResponse.token)
      await router.push({ name: 'home' })
    } else {
      errorMessage.value =
        'An error occurred while creating the token please log in to the login page'
    }
  } else {
    errorMessage.value = registerResponse.detail
  }

  isFormLoading.value = false
}

/***** Executed Code ******/
apiMethods
  .getData('specialities')
  .then((specialityList: Speciality[]) => {
    firstChoiceSpecialityList.value = specialityList.map((item) => ({
      value: item.id,
      title: item.label
    }))
  })
  .finally(() => (isFormLoading.value = false))
</script>

<template>
  <main class="f a-cent j-cent">
    <section class="f-col a-cent">
      <logo-title class="mb-128" />
      <router-link :to="{ name: 'login' }">
        <button>Log in ?</button>
      </router-link>
    </section>
    <c-t-form
      :onSubmit="registerRequest"
      classValue="bg-light-shadow-large br-50 p-32-64 ml-128"
      :isFormValid="isFormValid"
      :isRequiredFieldCompleted="isRequiredFieldCompleted"
      :errorMessage="errorMessage"
    >
      <h1 class="txt-dark mb-32">Register</h1>
      <c-t-input
        v-model="profile.pseudo"
        type="text"
        placeholder="Pseudo"
        :errorDisplay="false"
        marginBottom="mb-16"
        dataCy="register-user-pseudo"
      />
      <c-t-input
        v-model="user.email"
        type="text"
        placeholder="Mail"
        :errorDisplay="isMailValid"
        :errorMessage="MAIL_ERROR_MESSAGE"
        marginBottom="mb-16"
        dataCy="register-user-email"
      />
      <c-t-db-select
        v-model="rawSpecialityLevelValues"
        firstSelectTitle="Select specialities"
        secondSelectTitle="Level"
        :firstSelectChoices="firstChoiceSpecialityList"
        :secondSelectChoices="[
          { value: 'Beginner', title: 'Beginner' },
          { value: 'Intermediate', title: 'Intermediate' },
          { value: 'Advanced', title: 'Advanced' }
        ]"
        :errorDisplay="isSpecialitiesValid"
        errorMessage="select at least one specialty and select a level for each"
        marginBottom="mb-16"
      />
      <c-t-input
        v-model="user.password"
        type="password"
        placeholder="Password"
        :errorDisplay="isPasswordValid"
        :errorMessage="PASSWORD_ERROR_MESSAGE"
        marginBottom="mb-32"
        dataCy="register-user-password"
      />
      <button v-if="!isFormLoading" @click="checkIfFormValid()" data-cy="register-form-button">
        Sign in
      </button>
      <c-t-dot-loader v-if="isFormLoading" />
    </c-t-form>
  </main>
</template>

<style scoped>
@media (max-width: 1000px) {
  main {
    flex-direction: column;
  }

  svg {
    margin: 64px 0;
  }

  form {
    margin: 64px 0 0 0;
  }
}

@media (max-width: 600px) {
  svg {
    margin: 0 0 64px 0;
  }

  form {
    padding: 32px;
  }
}
</style>
