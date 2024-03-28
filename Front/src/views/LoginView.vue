<script setup lang="ts">
import { validationMethods } from '@/helpers/form/Validation'
import { ref } from 'vue'
import CTInput from '@/components/form/CTInput.vue'
import CTForm from '@/components/form/CTForm.vue'
import CTDotLoader from '@/components/loader/CTDotLoader.vue'
import LogoTitle from '@/components/svg/LogoTitle.vue'
import { ApiMethods } from '@/helpers/entities/ApiMethods'
import { useRouter } from 'vue-router'
import { User } from '@/entities/User'

/***** Variables ******/
const router = useRouter()
const apiMethods = new ApiMethods()

const user = ref<Partial<User>>({})

const isFormValid = ref(false)
const isRequiredFieldCompleted = ref(false)
const errorMessage = ref('')
const isFormLoading = ref(false)

/***** Functions ******/
function checkIfFormValid() {
  isRequiredFieldCompleted.value = validationMethods.validateRequiredFields(user.value, [
    'email',
    'password'
  ])
  isFormValid.value = isRequiredFieldCompleted.value
}

async function authRequest() {
  errorMessage.value = ''
  isFormLoading.value = true
  const response = await apiMethods.postData('auth', user.value)

  if (response.token) {
    localStorage.setItem('token', response.token)
    router.push({ name: 'home' })
  } else {
    errorMessage.value = response.message
  }
  isFormLoading.value = false
}
</script>

<template>
  <main class="f a-cent j-cent">
    <section class="f-col a-cent">
      <logo-title class="mb-128" />
      <router-link :to="{ name: 'register' }">
        <button>Create an account ?</button>
      </router-link>
    </section>
    <c-t-form
      :onSubmit="authRequest"
      classValue="bg-light-shadow-large br-50 p-32-64 ml-128"
      :isFormValid="isFormValid"
      :isRequiredFieldCompleted="isRequiredFieldCompleted"
      :errorMessage="errorMessage"
    >
      <h1 class="txt-dark mb-32">Login</h1>
      <c-t-input
        v-model="user.email"
        type="text"
        placeholder="Mail"
        :errorDisplay="false"
        marginBottom="mb-16"
        dataCy="login-user-email"
      />
      <c-t-input
        v-model="user.password"
        type="password"
        placeholder="Password"
        :errorDisplay="false"
        marginBottom="mb-32"
        dataCy="login-user-password"
      />
      <button v-if="!isFormLoading" @click="checkIfFormValid()" data-cy="login-form-button">
        Log in
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
