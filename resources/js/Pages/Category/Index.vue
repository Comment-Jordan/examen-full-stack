<script setup lang="ts">
import { ref, computed } from "vue";
import { router } from '@inertiajs/vue3';
import { useDisplay } from 'vuetify';

const props = defineProps<{ categorias: any[] }>();
console.log(props.categorias);

const headers: any = [
    { title: "ID", key: "id" },
    { title: "Categoria", key: "name" },
    { title: "Acciones", key: "action" }

];

const mobile = computed(() => {
    return useDisplay().mobile ?? false;
});

const editCategory = (id: number) => {
    router.get(`/category/edit/${id}`);
};

const deleteCategory = (id: number) => {
  if (!confirm("¿Seguro que quieres eliminar esta categoria?")) return;
  
  router.delete(`/category/${id}`, {
    onSuccess: () => {
        router.get('/category');
    },
    onError: (error) => console.log("Error al eliminar categoria: " + error),
  });
};

</script>


<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" md="6">
                <v-btn color="blue" @click="router.get('category/create')">Crear Categoria</v-btn>
            </v-col>
        </v-row>
        <v-card class="ytp-table-container">
            <v-card-title class="d-flex justify-space-between align-center">
                <span>Todas las categorias</span>
            </v-card-title>
            <v-data-table :headers="headers" :items="props.categorias" class="elevation-1" :mobile="mobile.value" itemsPerPageText="Filas por página">
                <template #item.action="{ item }">
                    <v-btn class="ma-2" color="warning" icon="mdi-plus-thick" variant="text"
                            @click="editCategory(item.id)">
                            <span class="material-icons">E</span>

                            <v-tooltip activator="parent" location="bottom">Editar</v-tooltip>
                    </v-btn>
                    <v-btn class="ma-2" color="error" icon="mdi-plus-thick" variant="text"
                            @click="deleteCategory(item.id)">
                            <span class="material-icons">X</span>
                            <v-tooltip activator="parent" location="bottom">Eliminar</v-tooltip>
                    </v-btn>

                </template>
            </v-data-table>
        </v-card>
    </v-container>
</template>
