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
              <li class="breadcrumb-item" style="padding: 5px">Concern</li>
              <li class="breadcrumb-item active" aria-current="page">
                Fill up
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <h1 class="display-4">Concerns</h1>
            </div>
          </div>
          <h3 class="text-center">
            Fill out the form for queries and concerns
          </h3>
          <form>
            <div class="form-row">
              <!-- Concern type dropdown -->
              <div class="form-group col-md-6">
                <label for="concernType">Concern type</label>
                <select id="concernType" class="form-control">
                  <option selected>Choose...</option>
                  <option>Option 1</option>
                  <option>Option 2</option>
                </select>
              </div>

              <!-- Concern for input -->
              <div class="form-group col-md-6">
                <label for="concernFor">Concern for</label>
                <input
                  type="text"
                  class="form-control"
                  id="concernFor"
                  placeholder="Concern for"
                />
              </div>
            </div>

            <!-- Description textarea -->
            <div class="form-group">
              <label for="description">Description</label>
              <textarea
                class="form-control"
                id="description"
                rows="3"
                placeholder="Description"
              ></textarea>
            </div>

            <div class="form-row">
              <!-- File upload -->
              <div class="form-group col-md-6">
                <label for="fileUpload">Upload</label>
                <input type="file" class="form-control-file" id="fileUpload" />
              </div>

              <!-- Date picker -->
              <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" />
              </div>
            </div>

            <!-- Submit button -->
            <button
              id="sweetalert-07"
              class="btn btn-primary"
              aria-label="Try me! Example: jQuery HTML with custom animation"
            >
              Submit
            </button>
          </form>
        </div>
      </div>
      <!-- end row for breadcrumb and title -->
    </div>
    <!-- end container-fluid -->
  </div>
  <!-- end app-main -->
</template>

<script>
export default {
  // Add any required JavaScript here
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
