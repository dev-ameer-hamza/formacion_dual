<template>
  <div id="app">
      <Manuales :slides="slides" />
    </div>
</template>

<script>
import Manuales from "./components/manuales.vue";
export default {
name: "App",
data() {
      return {
        slides: [
          {
            localizacion: "{{ ../manuales/prueba1.jpeg') }}",
            texto: "manual 1",
          },
          {
            localizacion: "{{ ../manuales/prueba2.jpeg') }}",
            texto: "manual 2",
          },
          {
            localizacion: "{{ ../manuales/prueba3.jpeg') }}",
            texto: "manual 3",
          },
        ],
      };
    },
    components: {
      Manuales,
    },
}
</script>

