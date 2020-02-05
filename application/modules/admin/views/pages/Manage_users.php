<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->

<div id="myApp">
    <div class="page-wrapper">
        <div class="main_con">
                <div class="container-fluid">
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3 class="text-themecolor">Manage Users
                        </h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active">Manage Users</li>
                            </ol>
                        </div>
                        <div class="col-md-7 align-self-center text-right d-none d-md-block">
                            <button type="button" class="btn btn-theme " data-toggle="modal" data-target="#responsive-modal" ><i class='fas fa-user' ></i> Add User</button>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                            <table id="myTable" class="table   dt-responsive nowrap admin-table" style="width:100%">
                            <!-- <table id="example" class="table " style="width:100%"> -->
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company</th>
                                        <th>Email Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr v-for="(req) in file_requests" :key="req.request_id" :class="(req.request_status == 'Completed' ? 'row-completed' : '')">
                                        <td>{{req.request_id}}</td>
                                        <td>{{req.file_title }}</td>
                                        <td>{{req.request_status}}</td>
                                        <td>{{req.company_name}}</td>
                                        <td>{{req.department}}</td>
                                        <td>{{req.requested_date}}</td>
                                        <td class="action_td">
                                          <a href="javascript:;" title="View Details"><i class="fas fa-eye"></i></a>
                                          <a href="javascript:;" title="View Details"><i class="fas fa-pencil"></i></a>
                                          <a href="javascript:;" title="View Details"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>1</td>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>Hap Chan</td>
                                        <td>sample@asd.com</td>
                                        <td class="td-manage-user">
                                            <a href="javascript:;" title="View Details"><i class="fas fa-eye"></i></a>
                                          <a href="javascript:;" title="View Details"><i class="fas fa-edit"></i></a>
                                          <a href="javascript:;" title="View Details"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>James</td>
                                        <td>Doe</td>
                                        <td>Proweaver</td>
                                        <td>proweaver@asd.com</td>
                                        <td class="td-manage-user">
                                            <a href="javascript:;" title="View Details"><i class="fas fa-eye"></i></a>
                                          <a href="javascript:;" title="View Details"><i class="fas fa-edit"></i></a>
                                          <a href="javascript:;" title="View Details"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </div>
        </div>
    </div>
</div>

