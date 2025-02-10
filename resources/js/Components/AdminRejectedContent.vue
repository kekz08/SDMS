<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <!-- Begin card container -->
      <div class="card-container">
        <div class="card_card approved-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ approvedCount }}</h2>
            <p>Approved</p>
            <a href="admin_approved">View Details</a>
          </div>
        </div>
        <div class="card_card pending-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ pendingCount }}</h2>
            <p>Pending</p>
            <a href="admin_pending">View Details</a>
          </div>
        </div>
        <div class="card_card rejected-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ rejectedCount }}</h2>
            <p>Rejected</p>
            <a href="admin_rejected">View Details</a>
          </div>
        </div>
      </div>

      <!-- Application List Table for Rejected -->
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <h4 class="card-title">Application List - Rejected</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-dark mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Scholarship</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(application, index) in filteredRejectedApplications" :key="application.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ application.firstname }} {{ application.lastname }}</td>
                    <td>{{ application.scholarship.scholarship_name }}</td>
                    <td>{{ application.status }}</td>
                    <td>
                      <button class="btn btn-info btn-sm edit-button" @click="openReviewModal(application)">Review</button>
                      <button class="btn btn-danger btn-sm delete-button" @click="deleteApplication(application, index)">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Reviewing Application -->
      <div v-if="isModalVisible" class="modal-overlay" @click="closeModal">
        <div class="modal-content" @click.stop>
          <h3>Review Application</h3>
          <div class="modal-body">
            <p><strong>Name:</strong> {{ selectedApplication.firstname }} {{ selectedApplication.lastname }}</p>
            <p><strong>Scholarship:</strong> {{ selectedApplication.scholarship.scholarship_name }}</p>
            <p><strong>Sex:</strong> {{ selectedApplication.sex }}</p>
            <p><strong>Birthdate:</strong> {{ formatDate(selectedApplication.birthdate) }}</p>
            <p><strong>Track:</strong> {{ selectedApplication.track }}</p>
            <p v-if="selectedApplication.strand"><strong>Strand:</strong> {{ selectedApplication.strand }}</p>
            <p><strong>School:</strong> {{ selectedApplication.school }}</p>
            <p v-if="selectedApplication.talents"><strong>Talents:</strong> {{ selectedApplication.talents }}</p>
            <p><strong>Address:</strong> {{ selectedApplication.address }}</p>
            <p v-if="selectedApplication.guardian_name"><strong>Guardian:</strong> {{ selectedApplication.guardian_name }}</p>
            <p v-if="selectedApplication.guardian_contact"><strong>Guardian Contact:</strong> {{ selectedApplication.guardian_contact }}</p>
            <p v-if="selectedApplication.father_name"><strong>Father's Name:</strong> {{ selectedApplication.father_name }}</p>
            <p v-if="selectedApplication.father_occupation"><strong>Father's Occupation:</strong> {{ selectedApplication.father_occupation }}</p>
            <p v-if="selectedApplication.mother_name"><strong>Mother's Name:</strong> {{ selectedApplication.mother_name }}</p>
            <p v-if="selectedApplication.mother_occupation"><strong>Mother's Occupation:</strong> {{ selectedApplication.mother_occupation }}</p>
            <p><strong>Appointment Date:</strong> {{ formatDate(selectedApplication.appointment_date) }}</p>
          </div>
          <div class="modal-footer">
            <button @click="closeModal" class="btn btn-secondary">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "RejectedApplications",
  props: {
    applications: {
      type: Array,
      required: true,
    }
  },
  data() {
    return {
      isModalVisible: false,
      selectedApplication: null,
    };
  },
  computed: {
    filteredRejectedApplications() {
      return this.applications.filter(application => application.status === 'Rejected');
    },
    rejectedCount() {
      return this.applications.filter(application => application.status === 'Rejected').length;
    },
    pendingCount() {
      return this.applications.filter(application => application.status === 'Pending').length;
    },
    approvedCount() {
      return this.applications.filter(application => application.status === 'Approved').length;
    }
  },
  methods: {
    openReviewModal(application) {
      this.selectedApplication = application;
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
      this.selectedApplication = null;
    },
    reviewApplication() {
      axios
        .post(`/applications/review/${this.selectedApplication.id}`, { status: 'Reviewed' })
        .then((response) => {
          alert('Application reviewed successfully');
          this.closeModal();
        })
        .catch((error) => {
          console.error("Error reviewing application:", error);
          alert("An error occurred while reviewing the application.");
        });
    },
    deleteApplication(application, index) {
      if (confirm(`Are you sure you want to delete ${application.firstname} ${application.lastname}'s application?`)) {
        axios
          .delete(`/applications/${application.id}`)
          .then((response) => {
            if (response.status === 200) {
              this.applications.splice(index, 1);
              alert(response.data.message || "Application deleted successfully.");
            } else {
              alert("Unexpected response from the server.");
            }
          })
          .catch((error) => {
            console.error("Error deleting application:", error);
            alert("An error occurred while deleting the application.");
          });
      }
    },
    formatDate(date) {
      return new Date(date).toLocaleDateString();
    }
  }
};
</script>

<style scoped>
/* Modal Styles */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 5px;
  width: 600px;
  max-height: 80vh;
  overflow-y: auto;
}

.modal-body {
  margin-bottom: 15px;
}

.modal-footer {
  display: flex;
  justify-content: space-between;
}

button {
  margin-top: 10px;
}
</style>
