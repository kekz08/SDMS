<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <!-- Begin card container -->
      <div class="card-container">
        <!-- Approved card -->
        <div class="card_card approved-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ approvedCount }}</h2>
            <p>Approved</p>
            <a href="admin_approved">View Details</a>
          </div>
        </div>

        <!-- Pending card -->
        <div class="card_card pending-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ pendingCount }}</h2>
            <p>Pending</p>
            <a href="admin_pending">View Details</a>
          </div>
        </div>

        <!-- Rejected card -->
        <div class="card_card rejected-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ rejectedCount }}</h2>
            <p>Rejected</p>
            <a href="admin_rejected">View Details</a>
          </div>
        </div>
      </div>

      <!-- Application List Table -->
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <h1 class="display-4">Application List - Approved</h1>
            </div>
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
                  <!-- Loop through only approved applications -->
                  <tr v-for="(application, index) in filteredApprovedApplications" :key="application.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ application.firstname }} {{ application.lastname }}</td>
                    <td>{{ application.scholarship.scholarship_name }}</td>
                    <td>
                      <span class="badge badge-success">{{ application.status }}</span>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm" @click="openEditModal(application)">Edit</button>
                      <button class="btn btn-danger btn-sm" @click="deleteApplication(application.id)">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Application Modal -->
      <div v-if="showEditModal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Application</h5>
              <button type="button" class="close" @click="closeEditModal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="submitEditApplication">
                <!-- First Name -->
                <div class="form-group">
                  <label for="firstname">First Name</label>
                  <input type="text" id="firstname" v-model="editingApplication.firstname" class="form-control" required>
                </div>

                <!-- Last Name -->
                <div class="form-group">
                  <label for="lastname">Last Name</label>
                  <input type="text" id="lastname" v-model="editingApplication.lastname" class="form-control" required>
                </div>

                <!-- Scholarship -->
                <div class="form-group">
                  <label for="scholarship">Scholarship</label>
                  <select id="scholarship" v-model="editingApplication.scholarship_id" class="form-control" required>
                    <option v-for="scholarship in scholarships" :key="scholarship.id" :value="scholarship.id">
                      {{ scholarship.scholarship_name }}
                    </option>
                  </select>
                </div>

                <!-- Status -->
                <div class="form-group">
                  <label for="status">Status</label>
                  <select id="status" v-model="editingApplication.status" class="form-control" required>
                    <option value="Approved">Approved</option>
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                  </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update Application</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Edit Application Modal -->


    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  name: "AdminApproved",
  props: {
    applications: {
      type: Array,
      required: true,
    },
    scholarships: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      showEditModal: false,
      editingApplication: {},
    };
  },
  computed: {
    filteredApprovedApplications() {
      return this.applications.filter(application => application.status === 'Approved');
    },
    approvedCount() {
      return this.applications.filter(application => application.status === 'Approved').length;
    },
    pendingCount() {
      return this.applications.filter(application => application.status === 'Pending').length;
    },
    rejectedCount() {
      return this.applications.filter(application => application.status === 'Rejected').length;
    }
  },
  methods: {
    // Open the edit modal and populate the editingApplication data
    openEditModal(application) {
      this.editingApplication = { ...application };
      this.showEditModal = true;
    },

    // Close the edit modal
    closeEditModal() {
      this.showEditModal = false;
    },

    // Handle form submission for editing the application
    submitEditApplication() {
      Inertia.put(`/applications/${this.editingApplication.id}`, this.editingApplication)
        .then(() => {
          this.closeEditModal();
          alert("Application has been updated.");
        })
        .catch(error => {
          console.error("Error updating application:", error);
          alert("An error occurred while updating the application.");
        });
    },

    // Delete an application
    deleteApplication(id) {
      if (confirm("Are you sure you want to delete this application?")) {
        Inertia.delete(`/applications/${id}`)
          .then(() => {
            alert("Application has been deleted.");
          })
          .catch(error => {
            console.error("Error deleting application:", error);
            alert("An error occurred while deleting the application.");
          });
      }
    }
  }
};
</script>

<style scoped>
.modal {
  display: block;
  background-color: rgba(0, 0, 0, 0.5);
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1050;
}

.modal-dialog {
  max-width: 600px;
  width: 100%;
}

.modal-body {
  max-height: 400px;
  overflow-y: auto;
}
</style>
