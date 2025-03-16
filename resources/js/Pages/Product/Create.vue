<script setup>
import { computed, ref } from "vue";
import { useForm, usePage,  } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';
import { Validaciones } from "../../Utils/Validaciones";

const props = defineProps({
    categorias:{
        type: Object,
        required: true,
    }}
);

const valid = ref(false);

const form = useForm({
  name: '',
  stock: '',
  category_id: null,
});

const submitForm = async () => {
  router.post('/product/store', form, {
    onSuccess: () => {
      router.get('/product');
    },
    onError: (errors) => {
      console.log(errors);
    }
  });
};

</script>

<template>
  <v-container>    
    <v-form v-model="valid" @submit.prevent="submitForm" method="post">
      <!-- Campo Nombre -->
      <v-text-field
        v-model="form.name"
        label="Nombre"
        :rules="[Validaciones.product]"
        required
      ></v-text-field>

      <!-- Campo Stock -->
      <v-text-field
        v-model="form.stock"
        label="Stock"
        type="number"
        :rules="[v => !!v || 'Este campo es obligatorio']"
        required
      ></v-text-field>

      <!-- Select Categoría -->
    <v-select
      v-model="form.category_id"
      :items="props.categorias"
      item-value="id"
      item-title="name"
      label="Seleccionar categoría"
      outlined>
    </v-select>

      <!-- Botón de Enviar -->
       <v-row>
        <v-col cols="12">
          <v-btn type="submit" :disabled="!valid" color="blue">Crear</v-btn>
          <v-btn color="error" @click="router.get('/product')">Cancelar</v-btn>
        </v-col>
       </v-row>
      
    </v-form>
  </v-container>
</template>

<style scoped>
/* Aquí puedes agregar estilos si es necesario */
</style>
