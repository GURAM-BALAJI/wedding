<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Add New Photographer</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="photographer_add.php" enctype="multipart/form-data">

          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          </div>

          <div class="form-group">
            <label for="banner" class="col-sm-3 control-label">Banner</label>
            <div class="col-sm-9">
              <input type="file" class="form-control" id="banner" name="banner" required>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>

          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="phone" class="form-control" id="phone" name="phone" required>
            </div>
          </div>

          <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
          </div>

          <div class="form-group">
            <label for="map" class="col-sm-3 control-label">Map</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="map" name="map" required>
            </div>
          </div>

          <div class="form-group">
            <label for="website" class="col-sm-3 control-label">Website</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="website" name="website">
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
        <h4 class="modal-title"><b>Edit Photographer</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="photographer_edit.php">
          <input type="hidden" class="edit_photographer_id" name="id">

          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_name" name="name" required>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="edit_email" name="email" required>
            </div>
          </div>

          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="phone" class="form-control" id="edit_phone" name="phone" required>
            </div>
          </div>

          <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_address" name="address" required>
            </div>
          </div>

          <div class="form-group">
            <label for="map" class="col-sm-3 control-label">Map</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_map" name="map" required>
            </div>
          </div>

          <div class="form-group">
            <label for="website" class="col-sm-3 control-label">Website</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_website" name="website">
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
        <form class="form-horizontal" method="POST" action="photographer_delete.php">
          <input type="hidden" class="photographer_id" name="id">
          <div class="text-center">
            <p>DELETE PHOTOGRAPHER</p>
            <h2 class="bold photographer_name"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class="edit_photo_name"></span></b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="photographer_photo.php" enctype="multipart/form-data">
          <input type="hidden" class="edit_photo_id" name="id">
          <div class="form-group">
            <label for="banner" class="col-sm-3 control-label">Banner</label>
            <div class="col-sm-9">
              <input type="file" id="banner" name="banner" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- view  more -->
<div class="modal fade" id="view_more">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>view more...</b></h4>
      </div>
      <form class="form-horizontal">
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-4 control-label">Address:</label>
          <div class="col-sm-8">
            <h4 id="view_address"></h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Map:</label>
          <div class="col-sm-8">
            <p id="view_map"></p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Website:</label>
          <div class="col-sm-8">
            <h4 id="view_website"></h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Last Updated Date:</label>
          <div class="col-sm-8">
            <h4 id="view_updated_date"></h4>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Created Date:</label>
          <div class="col-sm-8">
            <h4 id="view_created_date"></h4>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
</form>
    </div>
  </div>
</div>
