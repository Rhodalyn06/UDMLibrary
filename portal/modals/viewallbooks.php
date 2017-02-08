<!--  Modals-->
<div class="modal fade" id="viewallbooks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">VIEW ALL BOOKS</h4>
            </div>
            <div class="modal-body">
                
    <div class="panel panel">
                        <div class="panel-heading col-xs-12">
                            
                                <div class = "col-xs-4">
                                    <button id="btnSelAll" type="button" class="btn btn-warning">Select All</button>
                                </div>
                                <div class = "col-xs-1">
                                </div>
                                <div class = "col-xs-4">
                                    <button id="btnGenBarcode" type="button" disabled class="btn btn-success">Generate Barcode</button>
                                </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="x">

                                    <thead>
                                      <tr>
                                        <td>
                                          Barcode
                                        </td>
                                        <td>
                                          Accession Number
                                        </td>
                                        <td>
                                          Status
                                        </td>
                                      </tr>
                                    </thead>
                                    <tbody id = "y">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                    
            </div>
            <div class="modal-footer">
                <button type="button" style="width:40%;font-size:20px;" class="btn btn-default" onclick="closeViewAllBook()">Cancel</button>
                <button type="button" style="width:40%;font-size:20px;" class="btn btn-success" onclick="addbook()">Add</button></br></br>
                <button type="button" style="width:40%;font-size:20px;" id = "btnDel" class="btn btn-danger" disabled> Weed</button> 
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->