<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <!-- Breadcrumb and title -->
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" style="padding: 5px">Educational Aids</li>
              <li class="breadcrumb-item active" aria-current="page">Apply Scholar</li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Multi-Step Form -->
      <div>
        <!-- Progress Tracker -->
        <div class="progress-tracker">
          <ul class="progress-steps">
            <li
              v-for="(step, index) in steps"
              :key="index"
              :class="{ active: currentStep === index, completed: currentStep > index }"
            >
              {{ step.label }}
            </li>
          </ul>
        </div>

        <!-- Form Content -->
        <form @submit.prevent="handleSubmit">

          <!-- Step 1: Personal Information -->
          <div v-if="currentStep === 0">
            <h2>Step 1: Personal Information</h2>
            <label for="lastname">Last Name:</label>
            <input type="text" v-model="formData.lastname" id="lastname" required /><br /><br />

            <label for="firstname">First Name:</label>
            <input type="text" v-model="formData.firstname" id="firstname" required /><br /><br />

            <label for="middlename">Middle Name:</label>
            <input type="text" v-model="formData.middlename" id="middlename" /><br /><br />

            <label for="sex">Sex:</label>
            <select v-model="formData.sex" id="sex">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select><br /><br />

            <label for="birthdate">Birthdate:</label>
            <input type="date" v-model="formData.birthdate" id="birthdate" required /><br /><br />

            <label for="track">Track:</label>
            <select v-model="formData.track" id="track">
              <option value="academic">Academic</option>
              <option value="sports">Sports</option>
            </select><br /><br />

            <label for="strand">Strand:</label>
            <input type="text" v-model="formData.strand" id="strand" /><br /><br />

            <label for="school">School:</label>
            <input type="text" v-model="formData.school" id="school" /><br /><br />

            <label for="talents">Talents (Optional):</label>
            <input type="text" v-model="formData.talents" id="talents" /><br /><br />

            <!-- Scholarship Selection -->
            <label for="scholarship">Select Scholarship:</label>
            <select v-model="formData.scholarship" id="scholarship" required>
              <option v-for="scholarship in openScholarships" :key="scholarship.id" :value="scholarship.id">
                {{ scholarship.scholarship_name }}
              </option>
            </select><br /><br />

          </div>

          <!-- Step 2: Residency -->
          <div v-if="currentStep === 1">
            <h2>Step 2: Residency</h2>

            <label for="address">Permanent Address:</label>
            <input type="text" v-model="formData.address" id="address" required /><br /><br />

            <label for="guardian">Are you living with your parents/guardian?</label>
            <select v-model="formData.guardian" id="guardian">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select><br /><br />

            <!-- Guardian Fields -->
            <div v-if="formData.guardian === 'yes'">
              <label for="guardian_name">Guardian's Name:</label>
              <input 
                type="text" 
                v-model="formData.guardian_name" 
                id="guardian_name" 
                :required="formData.guardian === 'yes'" 
              /><br /><br />

              <label for="guardian_contact">Guardian's Contact Number:</label>
              <input 
                type="text" 
                v-model="formData.guardian_contact" 
                id="guardian_contact" 
                :required="formData.guardian === 'yes'" 
              /><br /><br />
            </div>
          </div>

          <!-- Step 3: Family Background -->
          <div v-if="currentStep === 2">
            <h2>Step 3: Family Background</h2>
            <h3>Father</h3>
            <label for="father_name">Name:</label>
            <input type="text" v-model="formData.father_name" id="father_name" /><br /><br />

            <label for="father_occupation">Present Occupation:</label>
            <input type="text" v-model="formData.father_occupation" id="father_occupation" /><br /><br />

            <h3>Mother</h3>
            <label for="mother_name">Name:</label>
            <input type="text" v-model="formData.mother_name" id="mother_name" /><br /><br />

            <label for="mother_occupation">Present Occupation:</label>
            <input type="text" v-model="formData.mother_occupation" id="mother_occupation" /><br /><br />
          </div>

          <!-- Step 4: File Upload -->
          <div v-if="currentStep === 3">
            <h2>Step 4: File Upload</h2>
            <label for="report_card">Photocopy of Report Card (Form 138):</label>
            <input type="file" @change="handleFileUpload('report_card', $event)" /><br /><br />

            <label for="clearance">Barangay Clearance (Updated):</label>
            <input type="file" @change="handleFileUpload('clearance', $event)" /><br /><br />

            <label for="other_files">Other Documents (ID, Voter's ID, etc.):</label>
            <input type="file" @change="handleFileUpload('other_files', $event)" /><br /><br />
          </div>

          <!-- Step 5: Appointment -->
          <div v-if="currentStep === 4">
            <h2>Step 5: Set Appointment</h2>
            <label for="appointment_date">Choose a date:</label>
            <input type="date" v-model="formData.appointment_date" id="appointment_date" required /><br /><br />
          </div>

          <!-- Step 6: Finish -->
          <div v-if="currentStep === 5">
            <h2>Success!</h2>
            <p>You have successfully applied!</p>
          </div>

          <!-- Navigation Buttons -->
          <div class="navigation-buttons">
            <button type="button" @click="prevStep" :disabled="currentStep === 0">Previous</button>
            <button type="button" @click="nextStep" v-if="currentStep < steps.length - 1">Next</button>
            <button type="submit" v-if="currentStep === steps.length - 1">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  data() {
    return {
      currentStep: 0,
      steps: [
        { label: "Personal Information" },
        { label: "Residency" },
        { label: "Family Background" },
        { label: "File Upload" },
        { label: "Appointment" },
        { label: "Finish" },
      ],
      formData: {
        lastname: "",
        firstname: "",
        middlename: "",
        sex: "",
        birthdate: "",
        track: "",
        strand: "",
        school: "",
        talents: "",
        address: "",
        guardian: "",
        guardian_name: "",
        guardian_contact: "",
        father_name: "",
        father_occupation: "",
        mother_name: "",
        mother_occupation: "",
        appointment_date: "",
        scholarship: "",  // New field for scholarship
      },
      uploadedFiles: {},
    };
  },
  computed: {
    // Computed property to filter scholarships with status "Open"
    openScholarships() {
      return this.scholarships.filter(scholarship => scholarship.scholarship_status === "Open");
    }
  },
  methods: {
    nextStep() {
      if (this.currentStep < this.steps.length - 1) {
        this.currentStep++;
      }
    },
    prevStep() {
      if (this.currentStep > 0) {
        this.currentStep--;
      }
    },
    handleFileUpload(field, event) {
      this.uploadedFiles[field] = event.target.files[0];
    },
    handleSubmit() {
      const formData = new FormData();

      // Append form fields
      for (let key in this.formData) {
        formData.append(key, this.formData[key]);
      }

      // Append files to form data
      for (let key in this.uploadedFiles) {
        formData.append(key, this.uploadedFiles[key]);
      }

      // Send the FormData object via Inertia
      Inertia.post('/submit-scholarship', formData, {
        onSuccess: () => {
          this.$toast.success('Your application has been submitted successfully.');
        },
        onError: (errors) => {
          console.log(errors);
        }
      });
    }
  },
  props: {
    scholarships: {
      type: Array,
      required: true, // Ensures the scholarships data is passed down
    }
  }
};

</script>
