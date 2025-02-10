<template>
    <div class="col-md-5 mb-4 mx-2">
        <div class="card h-100 bg-teal text-white">
            <div class="card-body">
                <h4 class="card-title">{{ feature.title }}</h4>
                <p class="card-text">{{ feature.description }}</p>
                <a href="#" 
                   class="btn btn-info learn-more-button" 
                   @click.prevent="showMore"
                   :data-title="feature.title" 
                   :data-description="feature.moreInfo">
                   Learn More
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        feature: {
            type: Object,
            required: true
        }
    },
    methods: {
        showMore() {
            this.$emit("show-more", this.feature);
        }
    }
};
</script>

<style scoped>
        p {
            color: #fff;
            font-weight: 400;
            font-size: 1rem;
            line-height: 1.714rem;
        }
</style>
