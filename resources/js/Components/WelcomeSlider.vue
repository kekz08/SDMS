<template>
  <div class="app-main" id="main" :style="mainBackgroundStyle">
    <div class="container-fluid text-center" :style="containerFluidStyle">
      <div class="row align-items-center justify-content-center" :style="rowStyle">
        <div class="col-md-6 text-left">
          <div class="image-slider">
            <img
              v-for="(image, index) in images"
              :key="index"
              :src="image.src"
              :alt="image.alt"
              :class="{ active: index === currentIndex }"
              class="slider-image"
            />
            <div class="caption-overlay" v-if="captions.length">
              <p>{{ captions[currentIndex] }}</p>
            </div>
            <div class="slider-controls">
              <span class="prev" @click="changeSlide(-1)">&#10094;</span>
              <span class="next" @click="changeSlide(1)">&#10095;</span>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-right">
          <h1>Scholarship Data Management System</h1>
          <p>
            Empowering Education Through Streamlined Scholarship Management
          </p>
          <WelcomeButton />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import WelcomeButton from './WelcomeButton.vue';

// Images and captions for the slider
const currentIndex = ref(0);
const captions = [
  "Graduation Ceremony",
  "Scholarship Awards",
  "Student Success",
];
const images = ref([
  { src: "assets/images/newbg.jpeg", alt: "Graduation Ceremony" },
  { src: "assets/images/newbg2.jpeg", alt: "Scholarship Awards" },
  { src: "assets/images/newbg3.jpg", alt: "Student Success" },
]);

// Function to change slides
function changeSlide(direction) {
  currentIndex.value =
    (currentIndex.value + direction + images.value.length) % images.value.length;
}

// Start automatic slide change after 10 seconds
onMounted(() => {
  setInterval(() => changeSlide(1), 10000);
});

// Styles
const mainBackgroundStyle = reactive({
  background: 'linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2))',
  backgroundSize: 'cover',
  backgroundPosition: 'center'
});

const containerFluidStyle = reactive({
  position: 'relative',
  zIndex: '1'
});

const rowStyle = reactive({
  padding: '120px 0',
  marginBottom: '200px'
});
</script>

<style scoped>
.image-slider {
  position: relative;
}

.slider-image {
  display: none;
  width: 100%;
  height: auto;
  transition: opacity 1s ease;
}

.slider-image.active {
  display: block;
  opacity: 1;
}

.caption-overlay {
  position: absolute;
  bottom: 30px;
  left: 30px;
  color: white;
  font-size: 20px;
  font-weight: bold;
}

.slider-controls {
  position: absolute;
  top: 50%;
  left: 10px;
  right: 10px;
  display: flex;
  justify-content: space-between;
  z-index: 2;
}

.prev, .next {
  font-size: 2rem;
  color: white;
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.5);
  padding: 10px;
  border: none;
  border-radius: 50%;
}
p {
    color: #fff;
    font-weight: 400;
    font-size: 1rem;
    line-height: 1.714rem;
}
</style>
