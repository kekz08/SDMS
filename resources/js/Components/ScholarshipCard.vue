<template>
    <div class="col-md-5 col-lg-5 mb-4">
        <div class="card scholarship-card">
            <div class="card-body">
                <h5 class="card-title">{{ scholarship.title }}</h5>
                <p class="card-text">{{ scholarship.description }}</p>
                <a href="#" class="btn btn-info learn-more-button" @click.prevent="showDetails">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        scholarship: {
            type: Object,
            required: true
        }
    },
    methods: {
        showDetails() {
            this.$emit('show-details', this.scholarship);
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