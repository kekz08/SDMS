<template>
    <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row for breadcrumb and title -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" style="padding: 5px;">Logs</li>
                                        <li class="breadcrumb-item active" aria-current="page">Logs & Notifcations</li>
                                    </ol>
                                </nav>
                                <h1 class="display-4">Logs & Notifcations</h1>
                            </div>
                        </div>
                        <!-- end row for breadcrumb and title -->
                        <div class="col-12 col-lg-6">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h1 class="display-4">Login Sessions</h1>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-dark mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Location</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Device</th>
                                                    <th scope="col">IP Address</th>
                                                    <th scope="col">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>vnimez</td>
                                                    <td>
                                                        <a href="#" class="text-hover-primary text-gray-600">USA(5)</a>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                                    </td>

                                                    <td>Chrome - Windows</td>

                                                    <td>236.125.56.78</td>

                                                    <td>2 mins ago</td>
                                                </tr>
                                                <tr>
                                                    <td>uverru</td>
                                                    <td>
                                                        <a href="#" class="text-hover-primary text-gray-600">United Kingdom(10)</a>
                                                    </td>
                                                    
                                                    <td>
                                                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                                    </td>
                        
                                                    <td>Safari - Mac OS</td>
                        
                                                    <td>236.125.56.78</td>
                                                    
                                                    <td>10 mins ago</td>
                                                </tr>
                                                <tr>
                                                    <td>rallan</td>
                                                    <td>
                                                        <a href="#" class="text-hover-primary text-gray-600">Norway(-)</a>
                                                    </td>
                                                    
                                                    <td>
                                                        <span class="badge badge-light-danger fs-7 fw-bold">ERR</span>
                                                    </td>
                        
                                                    <td>Firefox - Windows</td>
                        
                                                    <td>236.125.56.10</td>
                                                    
                                                    <td>20 mins ago</td>
                                                </tr>
                                                <tr>
                                                    <td>doydoy</td>
                                                    <td>
                                                        <a href="#" class="text-hover-primary text-gray-600">Japan(112)</a>
                                                    </td>
                                                    
                                                    <td>
                                                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                                    </td>
                        
                                                    <td>iOS - iPhone Pro</td>
                        
                                                    <td>236.125.56.54</td>
                                                    
                                                    <td>30 mins ago</td>
                                                </tr>
                                                <tr>
                                                    <td>aceniza</td>
                                                    <td>
                                                        <a href="#" class="text-hover-primary text-gray-600">Italy(5)</a>
                                                    </td>
                                                    
                                                    <td>
                                                        <span class="badge badge-light-warning fs-7 fw-bold">WRN</span>
                                                    </td>
                        
                                                    <td>Samsung Noted 5- Android</td>
                        
                                                    <td>236.100.56.50</td>
                                                    
                                                    <td>40 mins ago</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h1 class="display-4">Logs</h1>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-light-primary">
                                        <i class="ki-duotone ki-cloud-download fs-3"><span class="path1"></span><span class="path2"></span></i>  
                                        Download Report
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-dark mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">404 WRN</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/customer/c_671909daea6fb/not_found                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        21 Feb 2024, 10:10 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-danger">500 ERR</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/invoice/in_4728_9418/invalid                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        25 Oct 2024, 6:43 am                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">404 WRN</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/customer/c_671909daea6fd/not_found                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        22 Sep 2024, 6:43 am                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">404 WRN</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/customer/c_671909daea6fd/not_found                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        24 Jun 2024, 8:43 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">404 WRN</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/customer/c_671909daea6fc/not_found                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        25 Jul 2024, 2:40 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-success">200 OK</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/invoices/in_9766_5428/payment                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        15 Apr 2024, 10:30 am                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-success">200 OK</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/invoices/in_1388_6636/payment                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        10 Mar 2024, 10:10 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-warning">404 WRN</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/customer/c_671909daea6fd/not_found                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        24 Jun 2024, 9:23 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-success">200 OK</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/invoices/in_9766_5428/payment                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        20 Dec 2024, 8:43 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Badge--->
                                                    <td class="min-w-70px">
                                                        <div class="badge badge-light-success">200 OK</div>
                                                    </td>
                                                    <!--end::Badge--->
                         
                                                    <!--begin::Status--->
                                                    <td>
                                                       POST /v1/invoices/in_5155_3998/payment                            </td>
                                                    <!--end::Status--->
                        
                                                    <!--begin::Timestamp--->
                                                    <td class="pe-0 text-end min-w-200px">
                                                        25 Jul 2024, 6:05 pm                            </td>
                                                    <!--end::Timestamp--->
                                                </tr>
                                                <!--end::Table row-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div>
</template>