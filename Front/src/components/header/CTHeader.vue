<script setup lang="ts">
import CTLogo from '@/components/svg/CTLogo.vue'
import PictoProfile from '@/components/svg/PictoProfile.vue'
</script>

<template>
  <header class="f f-row j-betw a-cent p-0-64">
    <router-link :to="{ name: 'home' }">
      <CTLogo />
    </router-link>

    <nav class="f f-row a-cent">
      <router-link :to="{ name: 'home' }">
        <p>Find a project</p>
      </router-link>
      <router-link :to="{ name: 'home' }">
        <p class="ml-128">My projects</p>
      </router-link>
    </nav>

    <router-link :to="{ name: 'login' }">
      <PictoProfile />
    </router-link>
  </header>
</template>

<style scoped>
header {
  min-height: 90px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  @media (max-width: 460px) {
    padding: 0 32px;
  }
}

nav {
  @media (max-width: 580px) {
    flex-direction: column;
  }
}

.ml-128 {
  @media (max-width: 800px) {
    margin-left: 64px;
  }
  @media (max-width: 580px) {
    margin-left: 0;
  }
}

p {
  font-size: 18px;
  @media (max-width: 700px) {
    font-size: 16px;
  }
}
</style>
