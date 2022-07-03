<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Add New Call Logs</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="call_logs_add.php">

          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" required>
            </div>
          </div>

          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="phone" class="form-control" name="phone" required>
            </div>
          </div>

          <div class="form-group">
            <label for="remark" class="col-sm-3 control-label">Remark</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="remark">
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Edit call_logs</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="call_logs_edit.php">
          <input type="hidden" class="edit_call_logs_id" name="id">

          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_call_logs_name" name="name" required>
            </div>
          </div>

          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="phone" class="form-control" id="edit_call_logs_phone" name="phone" required>
            </div>
          </div>

          <div class="form-group">
            <label for="remark" class="col-sm-3 control-label">Remark</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_call_logs_remark" name="remark">
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Deleting...</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="call_logs_delete.php">
          <input type="hidden" class="delete_call_logs_id" name="id">
          <div class="text-center">
            <p>DELETE CALL LOG</p>
            <h2 class="bold delete_call_logs_name"></h2>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

