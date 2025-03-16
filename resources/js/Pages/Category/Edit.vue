<script setup>
import { computed, onMounted, ref } from "vue";
import { useForm, usePage,  } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';
import { Validaciones } from "../../Utils/Validaciones";

const props = defineProps({
  categoria:{
    type: Object,
    required: true,
  }
}
);

const valid = ref(false);

const form = useForm({
  name: props.categoria.name || '',
});

const submitForm = async () => {
  router.put(`/category/${props.categoria.id}`, form, {
    onSuccess: () => {
      router.get('/category');
    },
    onError: (errors) => {
      console.log(errors);
    }
  });
};

onMounted(() => {
  // Initialize valid state based on initial form data
  valid.value = form.name !== '';
});

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
          <v-btn type="submit" :disabled="!valid" color="blue">Actualizar</v-btn>
          <v-btn color="error" @click="router.get('/category')">Cancelar</v-btn>
        </v-col>
       </v-row>
      
    </v-form>
  </v-container>
</template>

<style scoped>
/* Aquí puedes agregar estilos si es necesario */
</style>
