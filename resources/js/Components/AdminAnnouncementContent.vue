<template>
    <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row for breadcrumb and title -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" style="padding: 5px;">Announcement</li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                                <h1 class="display-4">Announcement List</h1>
                        </div>
                        <!-- end row for breadcrumb and title -->
                        <div class="col-12 col-lg-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <button class="btn btn-primary" id="addAdminButton">Add Announcement</button>
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
                                                    <td>new educational assistance ahead.</td>
                                                    <td>Nov. 5, 2024</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm edit-button">Edit</button>
                                                        <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Eyes here!</td>
                                                    <td>Pay out on blah blah blah</td>
                                                    <td>Nov. 3, 2024</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm edit-button">Edit</button>
                                                        <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bad news!</td>
                                                    <td>Pay out postpone blah blah blah</td>
                                                    <td>Nov. 1, 2024</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm edit-button">Edit</button>
                                                        <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
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
            </div>

            <!-- Add Admin Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add New Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addAdminForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="adminId">Title</label>
                        <input type="text" class="form-control" id="adminId" name="adminId" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="adminUsername">Description</label>
                        <input type="text" class="form-control" id="adminUsername" name="adminUsername" placeholder="Enter Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" id="userId" name="userId">
                    <div class="form-group">
                        <label for="username">Title</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Description</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<script>
    
</script>