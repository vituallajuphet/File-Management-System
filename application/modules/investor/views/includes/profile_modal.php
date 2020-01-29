<div id="company_modal" class="modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Companies </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <div class="modal-body">
               <!-- start -->
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Company ID</th>
                                    <th>Company Name</th>
                                    <th>Email Address</th>
                                    <th>Company Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="comp in companies">
                                    <td>{{comp.company_id}}</td>
                                    <td>{{comp.company_name}}</td>
                                    <td>{{comp.company_email}}</td>
                                    <td>{{comp.company_type}}</td>
                                </tr>
                            </tbody>
                        </table>
               <!-- end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>