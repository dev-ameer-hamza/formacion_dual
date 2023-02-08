<template>
  <div id="app">
<div id="carouselExampleCaptions" class="carousel slide d-none d-sm-block" data-bs-ride="carousel">
  
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="../images/carrousel1.jpeg" class="d-block w-100" height="500" alt="...">
      
      <div class="carousel-caption d-none d-md-block">
        <h5>Universidad de Deusto en Bilbao</h5>
        <p>Avda. de las Universidades, 24, 48007 Bilbao, Bizkaia </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../images/carrousel2.jpeg" class="d-block w-100 " height="500" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Universidad de Deusto en Vitoria</h5>
        <p>Arriagako Atea Kalea, 62, 01013 Gasteiz, Araba</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../images/carrousel3.jpeg" class="d-block w-100 " height="500"  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Universidad de Deusto en San Sebastián</h5>
        <p>Mundaitz Kalea, 50, 20012 Donostia, Gipuzkoa</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </button>
 </div> 
 </div>
</template>
<script>
     export default {
      name: "App",
       data() {
       }
     };
     </script>
<!--
<template>
    <div id="app">
      <AppSlider :slides="slides" />
    </div>
  </template>
  
  <script>
  import AppSlider from "./components/carrousel.vue";
  export default {
    name: "App",
    data() {
      return {
        slides: [
          {
            image: "{{ Vite::asset('resources/images/carrousel1.jpeg') }}",
            text: "deusto",
          },
          {
            image: "{{ Vite::asset('resources/images/carrousel2.jpeg') }}",
            text: "uni",
          },
          {
            image: "{{ Vite::asset('resources/images/carrousel3.jpeg') }}",
            text: "perfil",
          }
        ],
      };
    },
    components: {
      AppSlider,
    },
  };
  </script>
  
  <style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  </style>
 -->  