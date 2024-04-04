<script setup lang="ts">
import LogoTitle from '@/components/svg/LogoTitle.vue'
import LogoProfile from '@/components/svg/LogoProfile.vue'
</script>

<template>
    <div class="f f-row j-betw a-cent p-8-16" style="border-bottom: 1px solid rgba(255, 255, 255, 0.5);">

        <router-link :to="{ name: 'login' }">
            <logo-title/>
        </router-link>

        <div class="f f-row j-betw" style="margin-top: 16px; width: 35vw;">
            <router-link :to="{ name: 'register' }">
                <p>Find a project</p>
            </router-link>
            <router-link :to="{ name: 'register' }">
                <p>My projects</p>
            </router-link>
        </div>

        <router-link :to="{ name: 'login' }">
            <LogoProfile/>
        </router-link>   

    </div>
</template>

<style scoped>

  p {
    font-size: 22px;
    @media (max-width: 1000px) {
        font-size: 18px !important;
    }
    @media (max-width: 700px) {
        font-size: 15px !important;
    }
  }

</style>