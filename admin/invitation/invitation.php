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
            <li>Products</li>
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
                            echo "<td>" . $row['invitation_id'] . "</td>";
                            echo "<td>" . $row['invitation_photographer_id'] . "</td>";
                            if ($admin['invitation_edit'])
                              echo "<span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='" . $row['invitation_id'] . "'><i class='fa fa-edit'></i></a></span> ";
                            echo "</td>";
                            echo "<td>" . $row['invitation_name1'] . ' , '. $row['invitation_name2'] . "</td>";
                            echo "<td>" . $row['invitation_streaming_id'] . "</td>";
                            echo "<td>" . $row['invitation_streaming_password'] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-primary btn-sm view_more btn-flat' data-id='" . $row['invitation_id'] . "'><i class='fa fa-chevron-circle-down'></i> More</button> ";
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
          getRow(id);
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

      function getRow(id) {
        $.ajax({
          type: 'POST',
          url: 'invitation_row.php',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            $('.invitation_id').val(response.invitation_id);
            $('.edit_invitation_id').val(response.invitation_id);
            $('#edit_name').val(response.invitation_name);
            $('#edit_email').val(response.invitation_email);
            $('#edit_phone').val(response.invitation_phone);
            $('#edit_address').val(response.invitation_address);
            $('#edit_map').val(response.invitation_address_map);
            $('#edit_website').val(response.invitation_website);
            $('.invitation_name').html(response.invitation_name);
            $('.edit_photo_name').html(response.invitation_name);
            $('.edit_photo_id').val(response.invitation_id);
            $('#view_address').html(response.invitation_address);
            $('#view_map').html(response.invitation_address_map);
            $('#view_website').html(response.invitation_website);
            $('#view_updated_date').html(response.invitation_updated_date);
            $('#view_created_date').html(response.invitation_created_date);
          }
        });
      }
    </script>
  </body>
<?php } ?>
<?php include '../includes/req_end.php'; ?>

</html>