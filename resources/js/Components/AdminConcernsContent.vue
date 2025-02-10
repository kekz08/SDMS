<template>
    <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row for breadcrumb and title -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" style="padding: 5px;">Concern</li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end row for breadcrumb and title -->
                        <div class="col-12 col-lg-6">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h1 class="display-4">Concern List</h1>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#new">New</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#old">Old</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane container active" id="new">
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
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Read</button>
                                                                    <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Eyes here!</td>
                                                                <td>Pay out on blah blah blah</td>
                                                                <td>Nov. 3, 2024</td>
                                                                <td>
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Read</button>
                                                                    <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bad news!</td>
                                                                <td>Pay out postpone blah blah blah</td>
                                                                <td>Nov. 1, 2024</td>
                                                                <td>
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Read</button>
                                                                    <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane container fade" id="old">
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
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Read</button>
                                                                    <button class="btn btn-danger btn-sm delete-button" aria-label="Delete entry">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Eyes here!</td>
                                                                <td>Pay out on blah blah blah</td>
                                                                <td>Nov. 3, 2024</td>
                                                                <td>
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Read</button>
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
                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div>
</template>