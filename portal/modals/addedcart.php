 <!--  Modals-->
<div class="modal fade" id="addedcart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                Do you really want to add this book on books to be returned?
                <div class = "form-group">
                    <label>If yes, set Status</label>
                    <select class="form-control" id="bookStat">
                        <option value="Available">Available</option>
                        <option value="Lost">Lost</option>
                        <option value="Damaged">Damaged</option>
                    </select>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="no()">No</button>
                <button type="button" class="btn btn-success" onclick="yes()"><span class="glyphicon glyphicon-thumbs-up"></span>  Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->