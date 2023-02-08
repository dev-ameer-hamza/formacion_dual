<template>
  <div>
  <b-carousel
    id="carousel-fade"
    style="text-shadow: 0px 0px 2px #000"
    fade
    indicators
    img-width="1024"
    img-height="480"
  >
    <b-carousel-slide
      caption="First Slide"
      img-src="https://picsum.photos/1024/480/?image=10"
    ></b-carousel-slide>
    <b-carousel-slide
      caption="Second Slide"
      img-src="https://picsum.photos/1024/480/?image=12"
    ></b-carousel-slide>
    <b-carousel-slide
      caption="Third Slide"
      img-src="https://picsum.photos/1024/480/?image=22"
    ></b-carousel-slide>
  </b-carousel>
</div>
<!--CARROUSEL con vue
    <div class="slider" ref="slider">
      <div class="slider__controls">
        <a
          @click="moveSlider(n)"
          href=""
          v-for="n in slides.length"
          :key="n"
          class="slider__controls__link"
          >{{ n }}</a
        >
      </div>
      <div
        v-for="(slide, index) in slides"
        :key="index"
        :style="`background-image:url(${slide.image})`"
        class="slider__content"
      >
      {{ slide.text }}
      </div>
    </div>-->
  </template>
  
  <script>
  
  export default {
    name: "AppSlider",
    mounted() {
      this.slider = this.$refs.slider;
      this.height = this.slider.offsetHeight;
    },
    props: {
      slides: {
        type: Array,
        required: true,
      }
    },
    data() {
      return {
        slider: null,
        height: null,
      };
    },
    methods: {
      moveSlider(n) {
        //n = n === 1 ? 0 : n;
        n = n-1;
        this.slider.scrollTo({
          top: this.height * n,
          behavior: 'smooth'
        })
      }
    }
  };
  </script>
  
  <style>
  .slider {
    position: relative;
    height: 100vh;
    overflow: scroll;
    background-color: #ccc;
    scroll-snap-type: y mandatory;
  }
  
  .slider__controls {
    position: fixed;
    right: .5rem;
    top: 0;
    width: 3rem;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
  
  .slider__controls__link {
    width: 3rem;
    height: 3rem;
    background-color: rgba(255, 255, 255, .8);
    color: black;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    font-weight: bold;
    margin: 1rem 0;
  }
  
  .slider__content {
    height: 100vh;
    background-position: center;
    background-size: cover;
    scroll-snap-align: center;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: calc(3rem + 4vmin);
  }
  </style>
  