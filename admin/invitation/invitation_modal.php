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
          <input type="hidden" id="edit_invitation_id" name="id">

          <div class="form-group">
            <label for="photographer" class="col-sm-4 control-label">Photographer </label>
            <div class="col-sm-8">
              <span id="edit_invitation_photographer_id"></span>
            </div>
          </div>

          <hr>
          <div class="form-group">
            <label for="name1" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name1" name="name1" required>
            </div>
          </div>

          <div class="form-group">
            <label for="name1_profession" class="col-sm-4 control-label">profession</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name1_profession" name="name1_profession">
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_1_Type" class="col-sm-4 control-label">Type Social Media-1 </label>
            <div class="col-sm-8">
              <span id="edit_invitation_name1_social_media1_type"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_1" class="col-sm-4 control-label">Social Media-1</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name1_social_media1" name="name1_social_media_1">
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_2_Type" class="col-sm-4 control-label">Type Social Media-2 </label>
            <div class="col-sm-8">
              <span id="edit_invitation_name1_social_media2_type"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="name1_social_media_2" class="col-sm-4 control-label">Social Media-2</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name1_social_media2" name="name1_social_media_2">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="name2" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name2" name="name2" required>
            </div>
          </div>


          <div class="form-group">
            <label for="name2_profession" class="col-sm-4 control-label">profession</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name2_profession" name="name2_profession">
            </div>
          </div>


          <div class="form-group">
            <label for="name2_social_media_1_Type" class="col-sm-4 control-label">Type Social Media-1 </label>
            <div class="col-sm-8">
              <span id="edit_invitation_name2_social_media1_type"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="name2_social_media_1" class="col-sm-4 control-label">Social Media-1</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name2_social_media1" name="name2_social_media_1">
            </div>
          </div>


          <div class="form-group">
            <label for="name2_social_media_2_Type" class="col-sm-4 control-label">Type Social Media-2 </label>
            <div class="col-sm-8">
              <span id="edit_invitation_name2_social_media2_type"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="name2_social_media_2" class="col-sm-4 control-label">Social Media-2</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_name2_social_media2" name="name2_social_media_2">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="date" class="col-sm-4 control-label">Date</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" id="edit_invitation_date" name="date" required>
            </div>
          </div>

          <div class="form-group">
            <label for="time" class="col-sm-4 control-label">Time</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" id="edit_invitation_time" name="time" required>
            </div>
          </div>

          <div class="form-group">
            <label for="youtube" class="col-sm-4 control-label">Youtube Link</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_youtube_link" name="youtube" required>
            </div>
          </div>


          <div class="form-group">
            <label for="streaming_code" class="col-sm-4 control-label">Streaming Code</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_streaming_id" name="streaming_code" required>
            </div>
          </div>

          <div class="form-group">
            <label for="streaming_password" class="col-sm-4 control-label">Streaming Password</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_streaming_password" name="streaming_password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="invitation_search_name" class="col-sm-4 control-label">Invitation Search Name </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="edit_invitation_search_name" name="invitation_search_name" required>
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
          <input type="hidden" class="delete_invitation_id" name="id">
          <div class="text-center">
            <p>DELETE invitation</p>
            <b class="bold delete_invitation_name1"></b> & <b class="bold delete_invitation_name2"></b>
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
            <label class="col-sm-4 control-label">Photographer Id :</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_photographer_id"></h4>
            </div>
            <label class="col-sm-4 control-label">Name1 Details:</label>
            <div class="col-sm-8">
              <b id="view_invitation_name1"></b>
              ( <span id="view_invitation_name1_profession"></span> )<br>
              <b id="view_invitation_name1_social_media1_type"></b> :
              <span id="view_invitation_name1_social_media1"></span><br>
              <b id="view_invitation_name1_social_media2_type"></b> :
              <span id="view_invitation_name1_social_media2"></span>
            </div>
            <label class="col-sm-4 control-label">Name2 Details:</label>
            <div class="col-sm-8">
              <b id="view_invitation_name2"></b>
              ( <span id="view_invitation_name2_profession"></span> )<br>
              <b id="view_invitation_name2_social_media1_type"></b> :
              <span id="view_invitation_name2_social_media1"></span><br>
              <b id="view_invitation_name2_social_media2_type"></b> :
              <span id="view_invitation_name2_social_media2"></span>
            </div>
            <label class="col-sm-4 control-label">Date and Time:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_date_time"></h4>
            </div>
            <label class="col-sm-4 control-label">Youtube Link:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_youtube_link"></h4>
            </div>
            <label class="col-sm-4 control-label">Streaming Id:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_streaming_id"></h4>
            </div>
            <label class="col-sm-4 control-label">Streaming Password:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_streaming_password"></h4>
            </div>
            <label class="col-sm-4 control-label">Updated Date:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_updated_date"></h4>
            </div>
            <label class="col-sm-4 control-label">Created Date:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_created_date"></h4>
            </div>
            <label class="col-sm-4 control-label">Invitation Search Name:</label>
            <div class="col-sm-8">
              <h4 id="view_invitation_search_name"></h4>
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