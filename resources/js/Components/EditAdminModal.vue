<template>
  <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Admin</h5>
          <button type="button" class="close" @click="$emit('close')">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="adminName">Name</label>
            <input v-model="admin.name" type="text" class="form-control" id="adminName" />
          </div>
          <div class="form-group">
            <label for="adminEmail">Email</label>
            <input v-model="admin.email" type="email" class="form-control" id="adminEmail" />
          </div>
          <div class="form-group">
            <label for="adminRole">Role</label>
            <select v-model="admin.role" class="form-control" id="adminRole">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" @click="$emit('close')">Cancel</button>
          <button class="btn btn-primary" @click="saveChanges">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    admin: Object, // Admin data to be edited
  },
  methods: {
    saveChanges() {
      // Send a PUT request to update the admin data
      axios
        .put(`/api/admins/${this.admin.id}`, this.admin)
        .then((response) => {
          // On success, notify and close the modal
          alert('Admin updated successfully!');
          this.$emit('close'); // Close the modal
        })
        .catch((error) => {
          // Handle error, e.g., display a message
          alert('Error updating admin: ' + error.response.data.message);
        });
    },
  },
};
</script>

<style scoped>
/* Custom styles for your modal */
</style>
