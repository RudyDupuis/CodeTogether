<script setup lang="ts">
import CTHeader from '@/components/structure/CTHeader.vue'
import CTMainWithSubmenu, { type navField } from '@/components/structure/CTMainWithSubmenu.vue'
import { ref } from 'vue'

const navFields = ref<Array<navField>>([
  {
    label: 'Account Settings',
    icon: 'fa-solid fa-gear',
    link: 'home'
  },
  {
    label: 'Personal Information',
    icon: 'fa-solid fa-address-card',
    link: ''
  },
  {
    label: 'Project History',
    icon: 'fa-solid fa-clock-rotate-left',
    link: 'home'
  },
  {
    label: 'Log out',
    icon: 'fa-solid fa-right-from-bracket',
    link: 'home',
    isAtbottom: true
  }
])
</script>

<template>
  <CTHeader></CTHeader>
  <CTMainWithSubmenu :navFields="navFields">
    <template #nav-header><p>Profile Card here</p></template>
    <template #content><h1>Content here</h1></template>
  </CTMainWithSubmenu>
</template>
