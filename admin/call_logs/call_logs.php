<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>
<?php if ($admin['call_logs_view']) { ?>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include '../includes/navbar.php'; ?>
      <?php include '../includes/menubar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Call logs
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>CALL LOG'S</li>
            <li class="active">Call logs</li>
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
                  <?php if ($admin['call_logs_create']) { ?>
                    <div class="box-header with-border">
                      <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Call Log</a>
                    </div>
                  <?php } ?>
                  <div class="box-body">
                    <table id="example1" class="table table-bordered">
                      <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Remark</th>
                        <th>Updated</th>
                        <th>Created</th>
                        <th>Tools</th>
                      </thead>
                      <tbody>
                        <?php
                        $conn = $pdo->open();

                        try {
                          $stmt = $conn->prepare("SELECT * FROM call_logs WHERE call_logs_deleted='0' ORDER BY call_logs_id DESC");
                          $stmt->execute();
                          $slno=1;
                          foreach ($stmt as $row) {
                            echo "
                          <tr>";
                            echo "<td>" . $slno++ . "</td>";
                            echo "<td>" . $row['call_logs_name'] . "</td>";
                            echo "<td><a href='https://api.whatsapp.com/send?phone=91".$row['call_logs_phone']."&amp;text=' target='_blank'>" . $row['call_logs_phone'] . " <i class='fa fa-whatsapp'></i></a></td>";
                            echo "<td>" . $row['call_logs_remark'] . "</td>";
                            echo "<td>" . $row['call_logs_updated_date'] . "</td>";
                            echo "<td>" . $row['call_logs_created_date'] . "</td>";
                            echo "<td>";
                            if ($admin['call_logs_edit'])
                              echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['call_logs_id'] . "'><i class='fa fa-edit'></i> Edit</button> ";
                            if ($admin['call_logs_del'])
                              echo "<button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['call_logs_id'] . "'><i class='fa fa-trash'></i> Delete</button>";
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
      <?php include 'call_logs_modal.php'; ?>

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

        $(document).on('click', '.delete', function(e) {
          e.preventDefault();
          $('#delete').modal('show');
          var id = $(this).data('id');
          getRow(id);
        });



      });

      function getRow(id) {
        $.ajax({
          type: 'POST',
          url: 'call_logs_row.php',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(response) {
            $('.delete_call_logs_id').val(response.call_logs_id);
            $('.delete_call_logs_name').html(response.call_logs_name);
            $('.edit_call_logs_id').val(response.call_logs_id);
            $('#edit_call_logs_name').val(response.call_logs_name);
            $('#edit_call_logs_phone').val(response.call_logs_phone);
            $('#edit_call_logs_remark').val(response.call_logs_remark);
          }
        });
      }
    </script>
  </body>
<?php } ?>
<?php include '../includes/req_end.php'; ?>

</html>