<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>
<?php if ($admin['invitation_view']) { ?>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include '../includes/navbar.php'; ?>
      <?php include '../includes/menubar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invitations
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Mannage</li>
            <li class="active">Invitations</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
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
          <div class="panel panel-default" style="overflow-x:auto;">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <?php if ($admin['invitation_create']) { ?>
                    <div class="box-header with-border">
                      <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New invitation</a>
                    </div>
                  <?php } ?>
                  <div class="box-body">
                    <table id="example1" class="table table-bordered">
                      <thead>
                        <th>ID</th>
                        <th>PGR ID</th>
                        <th>Names</th>
                        <th>Code</th>
                        <th>Password</th>
                        <th>Tools</th>
                      </thead>
                      <tbody>
                        <?php
                        $conn = $pdo->open();

                        try {
                          $stmt = $conn->prepare("SELECT * FROM invitation WHERE invitation_deleted='0'");
                          $stmt->execute();
                          foreach ($stmt as $row) {
                            echo "
                          <tr>";
                          $invitation_photographer_id=$row['invitation_photographer_id'];
                            echo "<td>" . $row['invitation_id'] . "</td>";
                            $stmt1 = $conn->prepare("SELECT * FROM photographer WHERE photographer_id='$invitation_photographer_id'");
                            $stmt1->execute();
                            foreach ($stmt1 as $row1){
                              echo "<td><a href='https://api.whatsapp.com/send?phone=91".$row1['photographer_phone']."&amp;text=?love=".$row['invitation_search_name'].";' target='_blank'>";
                            echo $row1['photographer_name'].' , '.$row1['photographer_phone'].' ( '.$invitation_photographer_id.' ) ';
                            echo "<i class='fa fa-whatsapp'></i></a></td>";
                            }
                            echo "<td><a href='../../index.php?love=".$row['invitation_search_name']."' target='_blank'>" . $row['invitation_name1'] . ' , ' . $row['invitation_name2'] . "</a></td>";
                            echo "<td>" . $row['invitation_streaming_id'] . "</td>";
                            echo "<td>" . $row['invitation_streaming_password'] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-primary btn-sm view_more btn-flat' data-id='" . $row['invitation_id'] . "'><i class='fa fa-chevron-circle-down'></i> More</button> ";
                            echo "<a href='invitation_full_image_view.php?id=" . $row['invitation_id'] . "'><button class='btn btn-info btn-sm'><i class='fa fa-image'></i> Image</button></a> ";
                            if ($admin['invitation_edit'])
                              echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['invitation_id'] . "'><i class='fa fa-edit'></i> Edit</button> ";
                            if ($admin['invitation_del'])
                              echo "<button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['invitation_id'] . "'><i class='fa fa-trash'></i> Delete</button>";
                            echo "</td>";
                            echo "</tr>
                        ";
                          }
                        } catch (PDOException $e) {
                          echo $e->getMessage();
                        }

                        $pdo->close();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
      <?php include 'invitation_modal.php'; ?>

    </div>
    <!-- ./wrapper -->

    <?php include '../includes/scripts.php'; ?>
    <script>
      $(function() {
        $(document).on('click', '.edit', function(e) {
          e.preventDefault();
          $('#edit').modal('show');
          var id = $(this).data('id');
          getRow_edit(id);
        });

        $(document).on('click', '.view_more', function(e) {
          e.preventDefault();
          $('#view_more').modal('show');
          var id = $(this).data('id');
          getRow(id);
        });

        $(document).on('click', '.delete', function(e) {
          e.preventDefault();
          $('#delete').modal('show');
          var id = $(this).data('id');
          getRow(id);
        });
        $(document).on('click', '.photo', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          getRow(id);
        });

      });

      function getRow_edit(id) {
        $.ajax({
          type: 'POST',
          url: 'invitation_edit_row.php',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            $('#edit_invitation_id').val(response.invitation_id);
            $('#edit_invitation_photographer_id').html(response.invitation_photographer_id);
            $('#edit_invitation_name1').val(response.invitation_name1);
            $('#edit_invitation_name1_profession').val(response.invitation_name1_profession);
            $('#edit_invitation_name1_social_media1_type').html(response.invitation_name1_social_media1_type);
            $('#edit_invitation_name1_social_media1').val(response.invitation_name1_social_media1);
            $('#edit_invitation_name1_social_media2_type').html(response.invitation_name1_social_media2_type);
            $('#edit_invitation_name1_social_media2').val(response.invitation_name1_social_media2);
            $('#edit_invitation_name2').val(response.invitation_name2);
            $('#edit_invitation_name2_profession').val(response.invitation_name2_profession);
            $('#edit_invitation_name2_social_media1_type').html(response.invitation_name2_social_media1_type);
            $('#edit_invitation_name2_social_media1').val(response.invitation_name2_social_media1);
            $('#edit_invitation_name2_social_media2_type').html(response.invitation_name2_social_media2_type);
            $('#edit_invitation_name2_social_media2').val(response.invitation_name2_social_media2);
            $('#edit_invitation_date').val(response.invitation_date);
            $('#edit_invitation_time').val(response.invitation_time);
            $('#edit_invitation_youtube_link').val(response.invitation_youtube_link);
            $('#edit_invitation_streaming_id').val(response.invitation_streaming_id);
            $('#edit_invitation_streaming_password').val(response.invitation_streaming_password);
            $('#edit_invitation_search_name').val(response.invitation_search_name);
          }
        });
      }

      function getRow(id) {
        $.ajax({
          type: 'POST',
          url: 'invitation_row.php',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            $('.delete_invitation_id').val(response.invitation_id);
            $('.delete_invitation_name1').html(response.invitation_name1);
            $('.delete_invitation_name2').html(response.invitation_name2);
            $('.edit_options').html(response.options);
            $('#view_invitation_photographer_id').html(response.invitation_photographer_id);
            $('#view_invitation_name1').html(response.invitation_name1);
            $('#view_invitation_name1_profession').html(response.invitation_name1_profession);
            $('#view_invitation_name1_social_media1_type').html(response.invitation_name1_social_media1_type);
            $('#view_invitation_name1_social_media1').html(response.invitation_name1_social_media1);
            $('#view_invitation_name1_social_media2_type').html(response.invitation_name1_social_media2_type);
            $('#view_invitation_name1_social_media2').html(response.invitation_name1_social_media2);
            $('#view_invitation_name2').html(response.invitation_name2);
            $('#view_invitation_name2_profession').html(response.invitation_name2_profession);
            $('#view_invitation_name2_social_media1_type').html(response.invitation_name2_social_media1_type);
            $('#view_invitation_name2_social_media1').html(response.invitation_name2_social_media1);
            $('#view_invitation_name2_social_media2_type').html(response.invitation_name2_social_media2_type);
            $('#view_invitation_name2_social_media2').html(response.invitation_name2_social_media2);
            $('#view_invitation_date_time').html(response.invitation_date_time);
            $('#view_invitation_youtube_link').html(response.invitation_youtube_link);
            $('#view_invitation_streaming_id').html(response.invitation_streaming_id);
            $('#view_invitation_streaming_password').html(response.invitation_streaming_password);
            $('#view_invitation_updated_date').html(response.invitation_updated_date);
            $('#view_invitation_created_date').html(response.invitation_created_date);
            $('#view_invitation_search_name').html(response.invitation_search_name);
          }
        });
      }
    </script>
  </body>
<?php } ?>
<?php include '../includes/req_end.php'; ?>

</html>