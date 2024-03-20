<script setup lang="ts"></script>

<template>
  <div>
    <img src="../assets/images/logo-big.svg" class="mb-16" />
    <router-link :to="{ name: 'login' }">
      <button>Login ?</button>
    </router-link>
  </div>
  <form>
    <h1>Register</h1>
    <input type="text" placeholder="Pseudo" />
    <input type="mail" placeholder="Mail" />
    <input type="password" placeholder="Password" />
    <button>Sign in</button>
  </form>
</template>
