<script setup lang="ts">
import CTLogo from '@/components/svg/CTLogo.vue'
import PictoProfile from '@/components/svg/PictoProfile.vue'
</script>

<template>
  <header class="f f-row j-betw a-cent p-8-16">
    <router-link :to="{ name: 'home' }">
      <CTLogo />
    </router-link>

    <nav class="f f-row j-betw">
      <router-link :to="{ name: 'home' }">
        <p>Find a project</p>
      </router-link>
      <router-link :to="{ name: 'home' }">
        <p id="navbarItem">My projects</p>
      </router-link>
    </nav>

    <router-link :to="{ name: 'home' }">
      <PictoProfile />
    </router-link>
  </header>
</template>

<style scoped>
header {
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
}

#navbarItem {
  margin-left: 128px;
  @media (max-width: 800px) {
    margin-left: 64px;
  }
}

p {
  font-size: 18px;
  @media (max-width: 1000px) {
    font-size: 18px;
  }
  @media (max-width: 700px) {
    font-size: 15px;
  }
}
</style>
