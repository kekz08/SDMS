<template>
    <div class="container my-5">
        <h1 class="text-center mb-4">Testimonials</h1>
        <div class="testimonial-slider">
            <div class="testimonial-slider-container">
                <TestimonialSlide
                    v-for="(testimonial, index) in testimonials"
                    :key="index"
                    :testimonial="testimonial"
                    :is-active="index === currentIndex"
                />
            </div>
        </div>

        <!-- Slider Navigation Buttons -->
        <button class="prev-btn" @click="moveSlide(-1)">❮</button>
        <button class="next-btn" @click="moveSlide(1)">❯</button>
    </div>
</template>

<script>
import TestimonialSlide from './TestimonialSlide.vue';

export default {
    components: {
        TestimonialSlide
    },
    data() {
        return {
            testimonials: [
                {
                    img: "assets/images/haidee.jpg",
                    quote: "SDMS made it incredibly easy to find and apply for the right scholarships!",
                    name: "Haidee Lisondra"
                },
                {
                    img: "assets/images/johanna.jpg",
                    quote: "The application process was smooth and hassle-free, thanks to SDMS.",
                    name: "Johanna Marie Alipao"
                },
                {
                    img: "assets/images/tricia.jpg",
                    quote: "I highly recommend SDMS to anyone looking for scholarships!",
                    name: "Tricia Manto"
                }
            ],
            currentIndex: 0
        };
    },
    methods: {
        moveSlide(step) {
            this.currentIndex = (this.currentIndex + step + this.testimonials.length) % this.testimonials.length;
        },
        nextSlide() {
            this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
        }
    },
    mounted() {
        // Automatically change slides every 5 seconds
        setInterval(this.nextSlide, 5000);
    }
};
</script>

<style scoped>
/* Basic styling for testimonial slider */
.testimonial-slider-container {
    display: flex;
    overflow: hidden;
}

.testimonial-slide {
    min-width: 100%;
    transition: opacity 0.5s ease-in-out;
    opacity: 0;
    display: none;
}

.testimonial-slide.active {
    opacity: 1;
    display: block;
}

.prev-btn, .next-btn {
    cursor: pointer;
}
</style>
