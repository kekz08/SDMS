<template>
    <div class="modal fade show" style="display: block;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Educational Aid</h5>
            <button type="button" class="close" @click="$emit('close')">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="submitForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="scholarshipName">Scholarship Name</label>
                <input
                  type="text"
                  id="scholarshipName"
                  class="form-control"
                  v-model="formData.scholarship_name"
                  placeholder="Enter Scholarship Name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="scholarshipDescription">Description</label>
                <textarea
                  id="scholarshipDescription"
                  class="form-control"
                  v-model="formData.scholarship_description"
                  placeholder="Enter Description"
                  rows="3"
                  required
                ></textarea>
              </div>
              <div class="form-group">
                <label for="scholarshipType">Type</label>
                <input
                  type="text"
                  id="scholarshipType"
                  class="form-control"
                  v-model="formData.scholarship_type"
                  placeholder="Enter Scholarship Type"
                  maxlength="100"
                  required
                />
              </div>
              <div class="form-group">
                <label for="scholarshipAmount">Amount</label>
                <input
                  type="number"
                  id="scholarshipAmount"
                  class="form-control"
                  v-model="formData.scholarship_amount"
                  placeholder="Enter Amount"
                  min="0"
                  required
                />
              </div>
              <div class="form-group">
                <label for="scholarshipStatus">Status</label>
                <select
                  id="scholarshipStatus"
                  class="form-control"
                  v-model="formData.scholarship_status"
                  required
                >
                  <option value="Open">Open</option>
                  <option value="Closed">Closed</option>
                </select>
              </div>
              <div class="form-group">
                <label for="applicationDeadline">Application Deadline</label>
                <input
                  type="date"
                  id="applicationDeadline"
                  class="form-control"
                  v-model="formData.application_deadline"
                  :min="minDate"
                  required
                />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="$emit('close')">Cancel</button>
                <button type="submit" class="btn btn-primary" :disabled="loading">
                    {{ loading ? "Saving..." : "Save" }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        formData: {
          scholarship_name: "",
          scholarship_description: "",
          scholarship_type: "",
          scholarship_amount: "",
          scholarship_status: "Open", // Default to Open
          application_deadline: "",
        },
        loading: false,
        minDate: this.formatToday(), // For `application_deadline` validation
      };
    },
    methods: {
        async submitForm() {
        try {
            this.loading = true; // Show loading state
            // Send data to the backend (replace with your API endpoint)
            const response = await fetch("/api/scholarships", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(this.formData),
            });

            if (!response.ok) {
            // Log the response status if not OK
            const errorDetails = await response.json();
            throw new Error(`Failed to save scholarship. Status: ${response.status}, Message: ${errorDetails.message}`);
            }

            const result = await response.json();
            this.$emit("add-success", result); // Notify the parent to update the list
            this.$emit("close"); // Close the modal on success
        } catch (error) {
            console.error("Error adding scholarship:", error);
            alert(`Failed to save scholarship: ${error.message}`);
        } finally {
            this.loading = false; // Reset loading state
        }
        },
      formatToday() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, "0");
        const day = String(today.getDate()).padStart(2, "0");
        return `${year}-${month}-${day}`;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Adjust modal height and make it scrollable */
  .modal-dialog {
    max-width: 600px;
    height: 80%;
  }
  
  .modal-content {
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  
  .modal-body {
    overflow-y: auto;
    max-height: 75%; /* Allow scrolling */
  }
  
  .modal-footer {
    display: flex;
    padding: 1rem;
  }
  
  button:disabled {
    opacity: 0.6;
  }
  
  </style>
  