<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="menu">
      <v-list>
        <v-list-item @click="inicio">
          <v-list-item-title>Inicio</v-list-item-title>
        </v-list-item>
        <v-list-item @click="productos">
          <v-list-item-title>Productos</v-list-item-title>
        </v-list-item>
        <v-list-item @click="categorias">
          <v-list-item-title>Categorias</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar>
      <v-app-bar-nav-icon @click="toggleMenu">
        <v-icon :icon="mdiMenu" />
      </v-app-bar-nav-icon>
      <v-app-bar-title>Exeman Full Stack</v-app-bar-title>
    </v-app-bar>

    <v-main>
      <slot></slot>
    </v-main>
  </v-app>
</template>

<script setup>
import { ref } from 'vue';
import { mdiMenu } from '@mdi/js';
import { router } from '@inertiajs/vue3';

const menu = ref(false);

const toggleMenu = () => {
  menu.value = !menu.value;
};

const inicio = () => {
  router.get('/');
};

const productos = () => {
  router.get('/product');
};

const categorias = () => {
  router.get('/category');
};
</script>
