<script setup lang="ts">
import { ref } from 'vue'

export interface navField {
  label: string
  icon: string
  link: string
  isAtbottom?: boolean
}

interface Props {
  navFields: Array<navField>
}
defineProps<Props>()

const isMenuOpen = ref(false)

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}
</script>

<template>
  <main class="f full-height-minus-header">
    <section class="navSection f" :class="{ 'menu-open': isMenuOpen }">
      <nav class="light-border-right f-col j-betw full-height-minus-header bg-dark">
        <div>
          <div class="light-border-bottom">
            <slot name="nav-header"></slot>
          </div>
          <ul>
            <li v-for="field in navFields" :key="field.label">
              <router-link
                :to="{ name: field.link }"
                class="submenu-item f a-cent light-border-bottom"
                v-if="!field.isAtbottom"
              >
                <i :class="field.icon + ' ml-16'"></i>
                <p class="ml-32">{{ field.label }}</p>
              </router-link>
            </li>
          </ul>
        </div>
        <ul>
          <li v-for="field in navFields" :key="field.label">
            <router-link
              :to="{ name: field.link }"
              class="submenu-item f a-cent light-border-top"
              v-if="field.isAtbottom"
            >
              <i :class="field.icon + ' ml-16'"></i>
              <p class="ml-32">{{ field.label }}</p>
            </router-link>
          </li>
        </ul>
      </nav>
      <i
        class="open-menu-button fa-solid"
        :class="{ 'fa-xmark': isMenuOpen, 'fa-bars': !isMenuOpen }"
        @click="toggleMenu"
      ></i>
    </section>
    <section class="contentSection f-col a-cent j-cent"><slot name="content"></slot></section>
  </main>
</template>

<style scoped lang="scss">
.navSection {
  transition: transform 0.3s ease;
}
nav {
  width: 250px;
}
.open-menu-button {
  display: none;
  font-size: 30px;
  margin: 20px;

  &:hover {
    cursor: pointer;
    color: #ffbf1d;
  }
}
.menu-open {
  transform: translateX(0) !important;
}
.submenu-item {
  height: 60px;

  &:hover {
    i,
    p {
      color: #ffbf1d;
    }
  }

  i {
    font-size: 20px;
  }
  p {
    font-size: 16px;
  }
}
.contentSection {
  width: calc(100vw - 250px);
}

@media (max-width: 1000px) {
  .navSection {
    position: absolute;
    z-index: 2;
    transform: translateX(-80%);
  }
  .open-menu-button {
    display: block;
  }
  .contentSection {
    width: 100vw;
  }
}
</style>
