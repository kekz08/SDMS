<template>
    <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Educational Aid</h5>
            <button type="button" class="close" @click="$emit('close')">&times;</button>
          </div>
          <div class="modal-body">
            <!-- Title Field -->
            <div class="form-group">
              <label for="editTitle">Title</label>
              <input v-model="formData.scholarship_name" type="text" class="form-control" id="editTitle" required />
            </div>
            
            <!-- Description Field -->
            <div class="form-group">
              <label for="editDescription">Description</label>
              <input v-model="formData.scholarship_description" type="text" class="form-control" id="editDescription" required />
            </div>
  
            <!-- Due Date Field -->
            <div class="form-group">
              <label for="editDue">Due Date</label>
              <input v-model="formData.application_deadline" type="date" class="form-control" id="editDue" required />
            </div>
  
            <!-- Status Field -->
            <div class="form-group">
              <label for="editStatus">Status</label>
              <select v-model="formData.scholarship_status" class="form-control" id="editStatus" required>
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
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
  export default {
    props: {
      scholarship: Object, // The scholarship data to be edited
    },
    data() {
      return {
        // Clone the scholarship data to avoid direct mutation of the prop
        formData: { ...this.scholarship },
      };
    },
    methods: {
      saveChanges() {
        // Emit the updated scholarship data to the parent component
        this.$emit('update', this.formData); 
        this.$emit('close'); // Close the modal
      },
    },
  };
  </script>
  
  <style scoped>
  /* Custom styles for your modal */
  </style>
  