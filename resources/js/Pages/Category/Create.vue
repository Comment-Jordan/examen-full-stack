<script setup>
import { computed, ref } from "vue";
import { useForm, usePage,  } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';
import { Validaciones } from "../../Utils/Validaciones";

const valid = ref(false);

const form = useForm({
  name: ''
});

const submitForm = async () => {
  router.post(`/category/store`, form, {
    onSuccess: () => {
      router.get('/category');
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
        :rules="[Validaciones.category]"
        required
      ></v-text-field>

      <!-- Botón de Enviar -->
       <v-row>
        <v-col cols="12">
          <v-btn type="submit" :disabled="!valid" color="blue">Crear</v-btn>
          <v-btn color="error" @click="router.get('/category')">Cancelar</v-btn>
        </v-col>
       </v-row>
      
    </v-form>
  </v-container>
</template>

<style scoped>
/* Aquí puedes agregar estilos si es necesario */
</style>
