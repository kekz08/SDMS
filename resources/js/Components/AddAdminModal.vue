<template>
  <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Admin</h5>
          <button type="button" class="close" @click="$emit('close')">&times;</button>
        </div>
        <div class="modal-body">
          <!-- Username Field -->
          <div class="form-group">
            <label for="adminUsername">Name</label>
            <input v-model="admin.name" type="text" class="form-control" id="adminName" required />
          </div>
          <!-- Email Field -->
          <div class="form-group">
            <label for="adminEmail">Email</label>
            <input v-model="admin.email" type="email" class="form-control" id="adminEmail" required />
          </div>
          
          <!-- Role Selection -->
          <div class="form-group">
            <label for="adminRole">Role</label>
            <select v-model="admin.role" class="form-control" id="adminRole" required>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" @click="$emit('close')">Cancel</button>
          <button class="btn btn-primary" @click="addAdmin">Add Admin</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      admin: {
        name: '',
        email: '',
        role: 'user',  // Default role
      },
    };
  },
  methods: {
    // Method to add new admin
    addAdmin() {
      // Make sure that we have valid input data
      if (this.admin.name && this.admin.email) {
        // Send a POST request to create the new admin
        axios
          .post('/api/admins', this.admin)  // Adjust this URL to match your backend route
          .then((response) => {
            alert('Admin added successfully!');
            this.$emit('close'); // Close the modal after success
          })
          .catch((error) => {
            // Handle any errors that occur during the request
            alert('Error adding admin: ' + error.response.data.message);
          });
      } else {
        alert('Please fill in all fields.');
      }
    },
  },
};
</script>

<style scoped>
/* Custom styles for your modal */
</style>
