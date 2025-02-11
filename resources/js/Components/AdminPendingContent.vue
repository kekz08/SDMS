<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <!-- Begin card container -->
      <div class="card-container">
        <!-- Approved card -->
        <div class="card_card approved-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ approvedCount }}</h2> <!-- Count approved applications dynamically -->
            <p>Approved</p>
            <a href="admin_approved">View Details</a>
          </div>
        </div>

        <!-- Pending card -->
        <div class="card_card pending-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ pendingCount }}</h2> <!-- Count pending applications dynamically -->
            <p>Pending</p>
            <a href="admin_pending">View Details</a>
          </div>
        </div>

        <!-- Rejected card -->
        <div class="card_card rejected-card">
          <i class="fas fa-users card-icon"></i>
          <div class="card-content">
            <h2>{{ rejectedCount }}</h2> <!-- Count rejected applications dynamically -->
            <p>Rejected</p>
            <a href="admin_rejected">View Details</a>
          </div>
        </div>
      </div>

      <!-- Application List Table -->
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <h4 class="card-title">Application List - Pending</h4>
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
                  <!-- Loop through only pending applications -->
                  <tr v-for="(application, index) in filteredPendingApplications" :key="application.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ application.firstname }} {{ application.lastname }}</td>
                    <td>{{ application.scholarship.scholarship_name }}</td>
                    <td>{{ application.status }}</td>
                    <td>
                      <button class="btn btn-info btn-sm edit-button" @click="updateStatus(application, 'Approved')">Accept</button>
                      <button class="btn btn-danger btn-sm delete-button" @click="confirmReject(application)">Reject</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  name: "MyTableComponent",
  props: {
    applications: {
      type: Array,
      required: true,
    },
  },
  computed: {
    filteredPendingApplications() {
      return this.applications.filter(application => application.status === 'Pending');
    },
    pendingCount() {
      return this.applications.filter(application => application.status === 'Pending').length;
    },
    approvedCount() {
      return this.applications.filter(application => application.status === 'Approved').length;
    },
    rejectedCount() {
      return this.applications.filter(application => application.status === 'Rejected').length;
    },
  },
  methods: {
    // Method to handle status update (Accept/Reject)
    updateStatus(application, status) {
      Inertia.post(`/applications/${application.id}/update-status`, {
        status: status,
      }, {
        onSuccess: () => {
          // Success alert after status update
          window.alert(`Application ${application.firstname} ${application.lastname} has been marked as ${status}.`);
        },
      });
    },

    // Confirmation before rejecting an application
    confirmReject(application) {
      const isConfirmed = window.confirm(`Are you sure you want to reject the application of ${application.firstname} ${application.lastname}?`);
      if (isConfirmed) {
        this.updateStatus(application, 'Rejected');
      }
    },
  },
};
</script>

<style scoped>
/* Add custom styles if necessary */
</style>
