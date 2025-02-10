<template>
  <!-- begin app-main -->
  <div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
      <!-- begin row for breadcrumb and title -->
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" style="padding: 5px">
                Educational Aids
              </li>
              <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- end row for breadcrumb and title -->
      <div class="col-12 col-lg-12">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <h1 class="display-4">Educational Aids List</h1>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-dark mb-0">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Description</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(scholarship, index) in scholarships" :key="index">
                    <td>{{ scholarship.scholarship_name }}</td>
                    <td>{{ scholarship.scholarship_type }}</td>
                    <td>₱{{ scholarship.scholarship_amount.toLocaleString() }}</td>
                    <td>{{ scholarship.scholarship_description }}</td>
                    <td>{{ formatDate(scholarship.application_deadline) }}</td>
                    <td>
                      <!-- Badge logic for status -->
                      <span
                        class="badge"
                        :class="{
                          'badge-success': scholarship.scholarship_status === 'Open',
                          'badge-danger': scholarship.scholarship_status === 'Closed',
                        }"
                      >
                        {{ scholarship.scholarship_status }}
                      </span>
                    </td>
                    <td>
                      <!-- Action button logic -->
                      <a
                        v-if="scholarship.scholarship_status === 'Open'"
                        href="/apply"
                        class="btn btn-primary"
                      >
                        Apply now
                      </a>
                      <button
                        v-else
                        class="btn btn-secondary"
                        disabled
                      >
                        Closed
                      </button>
                    </td>
                  </tr>
                  <tr v-if="!scholarships.length">
                    <td colspan="7" class="text-center">
                      No scholarships available.
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end container-fluid -->
  </div>
  <!-- end app-main -->
</template>

<script>
export default {
  props: {
    scholarships: {
      type: Array,
      required: true, // Ensures the scholarships data is passed
    },
  },
  methods: {
    /**
     * Formats a date string to a more human-readable format.
     * Example: "2024-12-15" -> "December 15, 2024"
     */
    formatDate(date) {
      if (!date) return "No deadline provided";
      const options = { year: "numeric", month: "long", day: "numeric" };
      return new Intl.DateTimeFormat("en-US", options).format(new Date(date));
    },
  },
};
</script>

<style scoped>
/* Optional styling for the table */
.table th,
.table td {
  text-align: center;
  vertical-align: middle;
}

/* Badge styling for active/closed */
.badge-success {
  background-color: #28a745;
  color: #fff;
}

.badge-danger {
  background-color: #dc3545;
  color: #fff;
}
</style>
