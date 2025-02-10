<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" style="padding: 5px">Profile</li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <h1 class="display-4">Student Profile</h1>
            </div>
          </div>
          <form>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="lastname">Lastname</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastname"
                  value="Doe"
                />
              </div>

              <div class="form-group col-md-4">
                <label for="firstname">Firstname</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstname"
                  value="John"
                />
              </div>

              <div class="form-group col-md-4">
                <label for="middlename">Middlename</label>
                <input
                  type="text"
                  class="form-control"
                  id="middlename"
                  value="Patinio"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="sex">Sex</label>
                <input type="text" class="form-control" id="sex" value="Male" />
              </div>

              <div class="form-group col-md-4">
                <label for="contactNumber">Contact number</label>
                <input
                  type="text"
                  class="form-control"
                  id="contactNumber"
                  value="0912654861"
                />
              </div>

              <div class="form-group col-md-4">
                <label for="birthdate">Birthdate</label>
                <input
                  type="date"
                  class="form-control"
                  id="birthdate"
                  value="2018-02-09"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-8">
                <label for="address">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="address"
                  value="Sitio saging banana City"
                />
              </div>

              <div class="form-group col-md-4">
                <label for="studentId">Student ID</label>
                <input
                  type="text"
                  class="form-control"
                  id="studentId"
                  value="2018-02-09212"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  value="dont share your password"
                />
              </div>
            </div>

            <button
              id="sweetalert-06"
              class="btn btn-primary"
              aria-label="Try me! Example: A custom positioned dialog"
            >
              Save Changes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
</script>

<style scoped>
</style>