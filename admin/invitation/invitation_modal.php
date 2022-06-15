<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Add New Invitation</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="invitation_add.php" enctype="multipart/form-data">

          <div class="form-group">
            <label for="photographer" class="col-sm-4 control-label">Photographer </label>
            <div class="col-sm-8">
              <select class="form-control" id="photographer_id" name="photographer_id" required>
                <option value="">Select Photographer</option>
                <?php
                $stmt1 = $conn->prepare("SELECT * FROM photographer WHERE photographer_deleted='0'");
                $stmt1->execute();
                foreach ($stmt1 as $row1)
                  echo "<option value='" . $row1['photographer_id'] . "'>" . $row1['photographer_name'] . '(' . $row1['photographer_phone'] . ')' . "</option>";
                ?>
              </select>
            </div>
          </div>

          <hr>
          <div class="form-group">
            <label for="name1" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name1" name="name1" required>
            </div>
          </div>

          <div class="form-group">
            <label for="single_image1" class="col-sm-4 control-label">Single Image</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="single_image1" name="single_image1" required>
            </div>
          </div>

          <div class="form-group">
            <label for="name1_profession" class="col-sm-4 control-label">profession</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name1_profession" name="name1_profession">
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_1_Type" class="col-sm-4 control-label">Type Social Media-1 </label>
            <div class="col-sm-8">
              <select name="name1_social_media_1_Type" class="form-control">
                <option value="">Select Type</option>
                <option value="facebook">FaceBook</option>
                <option value="instagram">Instagram</option>
                <option value="twitter">Twitter</option>
                <option value="linkedin">Linkedin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_1" class="col-sm-4 control-label">Social Media-1</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name1_social_media_1" name="name1_social_media_1">
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_2_Type" class="col-sm-4 control-label">Type Social Media-2 </label>
            <div class="col-sm-8">
              <select name="name1_social_media_2_Type" class="form-control">
                <option value="">Select Type</option>
                <option value="facebook">FaceBook</option>
                <option value="instagram">Instagram</option>
                <option value="twitter">Twitter</option>
                <option value="linkedin">Linkedin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_2" class="col-sm-4 control-label">Social Media-2</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name1_social_media_2" name="name1_social_media_2">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="name2" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name2" name="name2" required>
            </div>
          </div>

          <div class="form-group">
            <label for="single_image2" class="col-sm-4 control-label">Single Image</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="single_image2" name="single_image2" required>
            </div>
          </div>

          <div class="form-group">
            <label for="name2_profession" class="col-sm-4 control-label">profession</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name2_profession" name="name2_profession">
            </div>
          </div>


          <div class="form-group">
            <label for="name2_social_media_1_Type" class="col-sm-4 control-label">Type Social Media-1 </label>
            <div class="col-sm-8">
              <select name="name2_social_media_1_Type" class="form-control">
                <option value="">Select Type</option>
                <option value="facebook">FaceBook</option>
                <option value="instagram">Instagram</option>
                <option value="twitter">Twitter</option>
                <option value="linkedin">Linkedin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name2_social_media_1" class="col-sm-4 control-label">Social Media-1</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name2_social_media_1" name="name2_social_media_1">
            </div>
          </div>


          <div class="form-group">
            <label for="name2_social_media_2_Type" class="col-sm-4 control-label">Type Social Media-2 </label>
            <div class="col-sm-8">
              <select name="name2_social_media_2_Type" class="form-control">
                <option value="">Select Type</option>
                <option value="facebook">FaceBook</option>
                <option value="instagram">Instagram</option>
                <option value="twitter">Twitter</option>
                <option value="linkedin">Linkedin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name2_social_media_2" class="col-sm-4 control-label">Social Media-2</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name2_social_media_2" name="name2_social_media_2">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="date" class="col-sm-4 control-label">Date</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" id="date" name="date" required>
            </div>
          </div>

          <div class="form-group">
            <label for="time" class="col-sm-4 control-label">Time</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" id="time" name="time" required>
            </div>
          </div>

          <div class="form-group">
            <label for="youtube" class="col-sm-4 control-label">Youtube Link</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="youtube" name="youtube" required>
            </div>
          </div>


          <div class="form-group">
            <label for="streaming_code" class="col-sm-4 control-label">Streaming Code</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="streaming_code" name="streaming_code" required>
            </div>
          </div>

          <div class="form-group">
            <label for="streaming_password" class="col-sm-4 control-label">Streaming Password</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="streaming_password" name="streaming_password" required>
            </div>
          </div>

          <div class="form-group">
            <label for="square_image1" class="col-sm-4 control-label">square image-1</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="square_image1" name="square_image1" required>
            </div>
          </div>

          <div class="form-group">
            <label for="square_image2" class="col-sm-4 control-label">square image-2</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="square_image2" name="square_image2" required>
            </div>
          </div>

          <div class="form-group">
            <label for="square_image3" class="col-sm-4 control-label">square image-3</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="square_image3" name="square_image3" required>
            </div>
          </div>

          <div class="form-group">
            <label for="long_image1" class="col-sm-4 control-label">Long image-1</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="long_image1" name="long_image1" required>
            </div>
          </div>

          <div class="form-group">
            <label for="long_image2" class="col-sm-4 control-label">Long image-2</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="long_image2" name="long_image2" required>
            </div>
          </div>

          <div class="form-group">
            <label for="full_image1" class="col-sm-4 control-label">Full image-1</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="full_image1" name="full_image1" required>
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
        <h4 class="modal-title"><b>Edit invitation</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="invitation_edit.php">
          <input type="hidden" class="edit_invitation_id" name="id">

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
        <form class="form-horizontal" method="POST" action="invitation_delete.php">
          <input type="hidden" class="invitation_id" name="id">
          <div class="text-center">
            <p>DELETE invitation</p>
            <h2 class="bold invitation_name"></h2>
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
        <form class="form-horizontal" method="POST" action="invitation_photo.php" enctype="multipart/form-data">
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