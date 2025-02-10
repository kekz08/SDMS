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
              <li class="breadcrumb-item" style="padding: 5px">Announcement</li>
              <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <h1 class="display-4">Announcement</h1>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-dark mb-0">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Heads on!</td>
                    <td>New educational assistance ahead.</td>
                    <td>Nov. 5, 2024</td>
                    <td>
                      <button
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#largeModal"
                      >
                        Read more
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>Eyes here!</td>
                    <td>Pay out on blah blah blah</td>
                    <td>Nov. 3, 2024</td>
                    <td>
                      <button
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#largeModal"
                      >
                        Read more
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>Bad news!</td>
                    <td>Pay out postponed blah blah blah</td>
                    <td>Nov. 1, 2024</td>
                    <td>
                      <button
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#largeModal"
                      >
                        Read more
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
