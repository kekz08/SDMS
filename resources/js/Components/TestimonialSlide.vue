<template>
    <div class="testimonial-slide" :class="{ active: isActive }">
        <img :src="testimonial.img" :alt="testimonial.name" class="testimonial-image">
        <h4>Client Says?</h4>
        <p class="testimonial-quote">"{{ testimonial.quote }}"</p>
        <p class="testimonial-name">{{ testimonial.name }}</p>
    </div>
</template>

<script>
export default {
    props: {
        testimonial: {
            type: Object,
            required: true
        },
        isActive: {
            type: Boolean,
            default: false
        }
    }
};
</script>

<style scoped>
/* Styles for the individual testimonial slides */
.testimonial-slide {
    opacity: 0;
    display: none;
    transition: opacity 0.5s ease-in-out;
}

.testimonial-slide.active {
    opacity: 1;
    display: block;
}
p {
    color: #fff;
    font-weight: 400;
    font-size: 1rem;
    line-height: 1.714rem;
}
</style>
