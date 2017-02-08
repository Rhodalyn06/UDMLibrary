 <!--  Modals-->
<div class="modal fade" id="addauthors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Sub author</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group" id = "divautfname">
                    <label>First Name:</label>
                    <input type="text" class="form-control" id="autfname"
                    onblur = "validateInput('autfname', this.value, 'divautfname')">

                </div>
                <div class="form-group" id = "divautlname">
                    <label>Last Name:</label>
                    <input type="text" class="form-control" id="autlname"
                    onblur = "validateInput('autlname', this.value, 'divautlname')" >

                </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" style="width:40%;font-size:20px;" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" style="width:40%;font-size:20px;" class="btn btn-success" onclick="adds()">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->