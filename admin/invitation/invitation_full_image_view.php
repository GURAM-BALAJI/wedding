<!DOCTYPE html>
<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>
<html>

<body>
<a href='invitation.php'><button class='btn btn-info btn-lg'> Back</button></a>
    <?php
    
    if (isset($_GET['id'])) {
        $conn = $pdo->open();
        if ($admin['invitation_edit']) { ?>
            <?php
        if (isset($_SESSION['error'])) {
          echo "
          <div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-warning'></i> Error!</h4>
            " . $_SESSION['error'] . "
          </div>
        ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
          <div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-check'></i> Success!</h4>
            " . $_SESSION['success'] . "
          </div>
        ";
          unset($_SESSION['success']);
        }
        ?>
          <div class="modal-body">
              <form class="form-horizontal" method="POST" action="invitation_photo.php" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" required>
                  <div class="form-group">
                      <label for="name" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                          <select name="image_name" class="form-control">
                              <option value="invitation_single_image1">Single Image-1 </option>
                              <option value="invitation_single_image2">Single Image-2 </option>
                              <option value="invitation_sq_image1">Square Image-1 </option>
                              <option value="invitation_sq_image2">Square Image-2 </option>
                              <option value="invitation_sq_image3">Square Image-3 </option>
                              <option value="invitation_long_image1">Long Image-1 </option>
                              <option value="invitation_long_image2">Long Image-2 </option>
                              <option value="invitation_full_image1">Full Image </option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="image" class="col-sm-3 control-label">Image</label>
                      <div class="col-sm-9">
                          <input class="form-control" type="file" id="image" name="image" required>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
                  </div>
              </form>
          </div>
  <?php }
        try {
            $stmt = $conn->prepare("SELECT invitation_single_image1,invitation_single_image2,invitation_sq_image1,invitation_sq_image2,invitation_sq_image3,invitation_long_image1,invitation_long_image2,invitation_full_image1 FROM invitation WHERE invitation_id='" . $_GET['id'] . "'");
            $stmt->execute();
            foreach ($stmt as $row) {
                echo " <img height='500px' width='300px' src='../../images/" . $row['invitation_single_image1'] . "'>";
                echo " <img height='500px' width='300px' src='../../images/" . $row['invitation_single_image2'] . "'>";
                echo " <img height='500px' width='500px' src='../../images/" . $row['invitation_sq_image1'] . "'>";
                echo " <img height='500px' width='500px' src='../../images/" . $row['invitation_sq_image2'] . "'>";
                echo " <img height='500px' width='500px' src='../../images/" . $row['invitation_sq_image3'] . "'>";
                echo " <img height='300px' width='500px' src='../../images/" . $row['invitation_long_image1'] . "'>";
                echo " <img height='300px' width='500px' src='../../images/" . $row['invitation_long_image2'] . "'>";
                echo " <img height='400px' width='800px' src='../../images/" . $row['invitation_full_image1'] . "'>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $pdo->close();
    } ?>
</body>
<?php include '../includes/req_end.php'; ?>
</html>