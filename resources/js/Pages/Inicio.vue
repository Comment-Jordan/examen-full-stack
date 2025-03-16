<script setup>
import { ref } from 'vue';
import Barras from '../Components/Graficas/Barras.vue';
import Pastel from '../Components/Graficas/Pastel.vue';
  
  
const props = defineProps({
  countProductosPorCategorias: Array,
  productos: Array
});

const colores = ['#4169E1', '#FF4500', '#32CD32', '#FFD700', '#8A2BE2', '#A52A2A', '#5F9EA0', '#D2691E', '#FF6347', '#8B0000'];

const productosPorCategoria = props.countProductosPorCategorias.map((item, index) => ({
  label: item.name,
  value: item.products_count,
  color: colores[index % colores.length]
}));

console.log(props.productos);

const stockProductos = props.productos.map((item, index) => ({
  label: item.name,
  value: item.stock,
  color: colores[index % colores.length]
}));

console.log(stockProductos);

  
</script>
<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <!-- Título principal más grande y llamativo -->
        <h1 class="display-1 font-weight-bold text-center">Estadísticas</h1>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6" md="6" lg="6">
        <!-- Título de la primera gráfica -->
        <h2 class="headline font-weight-bold text-left">Productos por categoría</h2>
        <Barras labelGraph="" :data="productosPorCategoria" />
      </v-col>
      <v-col cols="12" sm="6" md="6" lg="6">
        <!-- Título de la segunda gráfica -->
        <h2 class="headline font-weight-bold text-left">Stock de productos</h2>
        <Pastel labelGraph="Stock de productos" :data="stockProductos" />
      </v-col>
    </v-row>
  </v-container>
</template>


<style scoped>
/* ...existing code... */
</style>
  