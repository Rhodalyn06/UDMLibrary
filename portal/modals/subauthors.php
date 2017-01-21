 <!--  Modals-->
<div class="modal fade" id="subauthors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">View All Sub authors</h4>
            </div>
            <div class="modal-body">

            <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel">
                        <div class="panel-heading" id = "heads">
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblUser">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                      
                                        <th>
                                          First Name
                                        </th>
                                        <th>
                                          Last Name
                                        </th>
                                      
                                    </thead>
                                    <tbody id = "e">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>    
            </div>
        </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="addSub()">Add Sub-Authors</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->