<template>
    <div class="container my-5">
        <h1 class="text-center mb-4">Key Features</h1>
        <div class="row justify-content-center">
            <FeatureCard 
                v-for="(feature, index) in features" 
                :key="index" 
                :feature="feature"
                @show-more="handleShowMore"
            />
        </div>

        <!-- Modal for Feature Details -->
        <div class="modal fade" id="learnMoreModal" tabindex="-1" aria-labelledby="learnMoreModalLabel" aria-hidden="true" v-if="selectedFeature">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="learnMoreModalLabel">Feature Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>{{ selectedFeature.title }}</h6>
                        <p>{{ selectedFeature.moreInfo }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FeatureCard from './FeatureCard.vue';

export default {
    components: {
        FeatureCard
    },
    data() {
        return {
            features: [
                {
                    title: "Centralized Management",
                    description: "Manage all scholarships and applications from one easy-to-use dashboard.",
                    moreInfo: "This feature allows administrators to oversee and manage all scholarship applications efficiently from a single dashboard."
                },
                {
                    title: "Efficient Application Process",
                    description: "Students can easily apply and track the status of their scholarship applications.",
                    moreInfo: "Students can submit their scholarship applications with minimal effort and keep track of their application status in real-time."
                },
                {
                    title: "Data-Driven Insights",
                    description: "Generate reports to get insights on applications, funds, and student success.",
                    moreInfo: "This feature enables the generation of comprehensive reports that provide valuable insights into application trends, funding allocation, and overall student performance."
                }
            ],
            selectedFeature: null
        };
    },
    methods: {
        handleShowMore(feature) {
            this.selectedFeature = feature;
            $('#learnMoreModal').modal('show');  // Use jQuery to display the modal
        },
        closeModal() {
            this.selectedFeature = null;
            $('#learnMoreModal').modal('hide');  // Hide the modal when closed
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