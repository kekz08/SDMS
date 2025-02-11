<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" style="padding: 5px;">Educational Aids</li>
              <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
          </nav>
          <h1 class="display-4">Educational Aids List</h1>
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <button class="btn btn-primary" @click="showAddModal = true">
                Add Educational Aid
              </button>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-dark mb-0">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Due</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="scholarship in scholarships" :key="scholarship.id">
                    <td>{{ scholarship.scholarship_name }}</td>
                    <td>{{ scholarship.scholarship_description }}</td>
                    <td>{{ formatDate(scholarship.application_deadline) }}</td> <!-- Formatted date -->
                    <td>
                      <span
                        :class="{
                          'badge badge-success': scholarship.scholarship_status === 'Open',
                          'badge badge-danger': scholarship.scholarship_status === 'Closed',
                        }"
                      >
                        {{ scholarship.scholarship_status }}
                      </span>
                    </td>
                    <td>
                      <button @click="editScholarship(scholarship)" class="btn btn-info btn-sm edit-button">
                        Edit Scholarship
                      </button>
                      <button class="btn btn-danger btn-sm delete-button" @click="deleteScholarship(scholarship.id)">
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Modal -->
    <AddModal v-if="showAddModal" @close="showAddModal = false" @save="addScholarship" />

    <!-- Edit Modal -->
    <EditModal v-if="showEditModal" :scholarship="selectedScholarship" @close="showEditModal = false" @update="updateScholarship" />

    <!-- Success/Failure Message -->
    <div v-if="message" class="alert" :class="messageClass" role="alert">
      {{ message }}
    </div>
  </div>
</template>

<script>
import AddModal from "./AddEducationalAid.vue";
import EditModal from "./EditEducationalAid.vue";
import axios from "axios";

export default {
  components: { AddModal, EditModal },
  props: {
    scholarships: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      showAddModal: false,
      showEditModal: false,
      selectedScholarship: null,
      message: "", // To store success/error message
      messageClass: "", // Class for alert (success/error)
    };
  },
  methods: {
    // Format date to a more readable format
    formatDate(date) {
      const formattedDate = new Date(date);
      return new Intl.DateTimeFormat('en-US', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
      }).format(formattedDate);
    },
    async deleteScholarship(id) {
      const confirmed = confirm("Are you sure you want to delete this Educational Aid?");
      if (confirmed) {
        try {
          const response = await axios.delete(`/api/scholarships/${id}`);
          const scholarshipIndex = this.scholarships.findIndex(
            (scholarship) => scholarship.id === id
          );
          if (scholarshipIndex !== -1) {
            this.scholarships.splice(scholarshipIndex, 1);
          }
          this.message = "Educational Aid deleted successfully!";
          this.messageClass = "alert-success";
          setTimeout(() => {
            this.message = "";
          }, 3000);
        } catch (error) {
          this.message = "Failed to delete Educational Aid.";
          this.messageClass = "alert-danger";
          setTimeout(() => {
            this.message = "";
          }, 3000);
        }
      }
    },
    addScholarship(newScholarship) {
      this.scholarships.push(newScholarship);
      this.showAddModal = false;
      this.message = "Educational Aid added successfully!";
      this.messageClass = "alert-success";
      setTimeout(() => {
        this.message = "";
      }, 3000);
    },
    editScholarship(scholarship) {
      this.selectedScholarship = { ...scholarship };
      this.showEditModal = true;
    },
    updateScholarship(updatedScholarship) {
      const index = this.scholarships.findIndex((s) => s.id === updatedScholarship.id);
      if (index !== -1) {
        this.scholarships[index] = updatedScholarship;
        this.message = "Educational Aid updated successfully!";
        this.messageClass = "alert-success";
      }
      this.showEditModal = false;
      setTimeout(() => {
        this.message = "";
      }, 3000);
    },
  },
};
</script>

<style scoped>
.table {
  margin-top: 20px;
}

.badge-success {
  background-color: #28a745;
}

.badge-danger {
  background-color: #dc3545;
}

.alert-success {
  background-color: #28a745;
  color: white;
}

.alert-danger {
  background-color: #dc3545;
  color: white;
}
</style>
