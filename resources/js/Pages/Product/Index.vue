<script setup lang="ts">
import { ref, computed } from "vue";
import { router } from '@inertiajs/vue3';
import { useDisplay } from 'vuetify';

const props = defineProps<{ productos: any[] }>();
console.log(props.productos);

const headers: any = [
    { title: "ID", key: "id" },
    { title: "Producto", key: "name" },
    { title: "Stock", key: "stock" },
    { title: "Estatus", key: "agotarse" },
    { title: "Acciones", key: "action" }

];

const mobile = computed(() => {
    return useDisplay().mobile ?? false;
});

const editProduct = (id: number) => {
    router.get(`/product/edit/${id}`);
};

const deleteProduct = (id: number) => {
  if (!confirm("¿Seguro que quieres eliminar este producto?")) return;
  
  router.delete(`/product/${id}`, {
    onSuccess: () => {
        router.get('/product');
    },
    onError: (error) => console.log("Error al eliminar producto: " + error),
  });
};

</script>


<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-btn color="blue" @click="router.get('product/create')">Crear Producto</v-btn>
            </v-col>
        </v-row>
        <v-card class="ytp-table-container">
            <v-card-title class="d-flex justify-space-between align-center">
                <span>Todos los productos</span>
            </v-card-title>
            <v-data-table :headers="headers" :items="props.productos" class="elevation-1" :mobile="mobile.value" itemsPerPageText="Filas por página">
                <template #item.agotarse="{ item }">
                    <v-chip color="red" v-if="item.stock <= 10">Por agotarse</v-chip>
                    <v-chip color="green" v-else>Stock suficiente</v-chip>
                </template>
                <template #item.action="{ item }">
                    <v-btn class="ma-2" color="warning" icon="mdi-plus-thick" variant="text"
                            @click="editProduct(item.id)">
                            <span class="material-icons">E</span>

                            <v-tooltip activator="parent" location="bottom">Editar</v-tooltip>
                    </v-btn>
                    <v-btn class="ma-2" color="error" icon="mdi-plus-thick" variant="text"
                            @click="deleteProduct(item.id)">
                            <span class="material-icons">X</span>
                            <v-tooltip activator="parent" location="bottom">Eliminar</v-tooltip>
                    </v-btn>

                </template>
            </v-data-table>
        </v-card>
    </v-container>
</template>
