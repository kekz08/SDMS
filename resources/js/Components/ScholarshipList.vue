<template>
    <div class="container my-5">
        <h1 class="text-center mb-4">Available Scholarships</h1>
        <div class="row justify-content-center scholarship-cards">
            <ScholarshipCard 
                v-for="(scholarship, index) in scholarships" 
                :key="index" 
                :scholarship="scholarship"
                @show-details="showDetails"
            />
        </div>

        <!-- Modal for Scholarship Details -->
        <div class="modal fade" id="scholarshipModal" tabindex="-1" aria-labelledby="scholarshipModalLabel" aria-hidden="true" v-if="selectedScholarship">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scholarshipModalLabel">Scholarship Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6>{{ selectedScholarship.title }}</h6>
                        <p>{{ selectedScholarship.description }}</p>
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
import ScholarshipCard from './ScholarshipCard.vue';

export default {
    components: {
        ScholarshipCard
    },
    data() {
        return {
            scholarships: [
                {
                    title: "Scholarship Sample Title",
                    description: "Description of the scholarship and eligibility criteria.",
                    moreInfo: "Detailed information about this scholarship, including eligibility criteria and application process."
                },
                {
                    title: "Scholarship Sample Title2",
                    description: "Description of the scholarship and eligibility criteria.",
                    moreInfo: "Detailed information about this scholarship, including eligibility criteria and application process for Sample Title2."
                },
                {
                    title: "Scholarship Sample Title3",
                    description: "Description of the scholarship and eligibility criteria.",
                    moreInfo: "Detailed information about this scholarship, including eligibility criteria and application process for Sample Title3."
                },
                {
                    title: "Scholarship Sample Title4",
                    description: "Description of the scholarship and eligibility criteria.",
                    moreInfo: "Detailed information about this scholarship, including eligibility criteria and application process for Sample Title4."
                }
            ],
            selectedScholarship: null
        };
    },
    methods: {
        showDetails(scholarship) {
            this.selectedScholarship = scholarship;
            $('#scholarshipModal').modal('show');  // Using jQuery to display the modal
        },
        closeModal() {
            this.selectedScholarship = null;
            $('#scholarshipModal').modal('hide');  // Hide the modal when closed
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