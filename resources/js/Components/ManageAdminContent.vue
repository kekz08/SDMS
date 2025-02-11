<template>
  <div class="app-main">
    <div class="container-fluid">
      <!-- Breadcrumb and Title -->
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" style="padding: 5px;">Manage Admin Accounts</li>
              <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
          </nav>
          <h1 class="display-4">Manage Admin Accounts List</h1>
        </div>
      </div>

      <!-- Table and Add Button -->
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <button class="btn btn-primary" @click="showAddModal">Add Admin</button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-dark mb-0">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <AdminRow 
                    v-for="admin in admins" 
                    :key="admin.id" 
                    :admin="admin" 
                    @edit="showEditModal"
                    @delete="deleteAdmin" 
                  />
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modals -->
      <AddAdminModal v-if="isAddModalVisible" @close="isAddModalVisible = false" />
      <EditAdminModal v-if="isEditModalVisible" :admin="selectedAdmin" @close="isEditModalVisible = false" />
    </div>
  </div>
</template>

<script>
import AddAdminModal from "./AddAdminModal.vue";
import EditAdminModal from "./EditAdminModal.vue";
import AdminRow from "./AdminRow.vue";
import axios from "axios";

export default {
  components: {
    AddAdminModal,
    EditAdminModal,
    AdminRow,
  },
  props: {
    admins: Array // Accept the "admins" prop passed from the parent component
  },
  data() {
    return {
      isAddModalVisible: false,
      isEditModalVisible: false,
      selectedAdmin: null,
    };
  },
  methods: {
    showAddModal() {
      this.isAddModalVisible = true;
    },
    showEditModal(admin) {
      this.selectedAdmin = admin;
      this.isEditModalVisible = true;
    },
    deleteAdmin(adminId) {
      if (confirm(`Are you sure you want to delete the admin with ID: ${adminId}?`)) {
        // Send a DELETE request to the backend to delete the admin
        axios
          .delete(`/api/admins/${adminId}`)
          .then((response) => {
            alert(response.data.message); // Notify user on success
            this.admins = this.admins.filter((admin) => admin.id !== adminId); // Remove admin from the list
          })
          .catch((error) => {
            alert('Error deleting admin: ' + error.response.data.message); // Handle error
          });
      }
    },
  },
};
</script>
