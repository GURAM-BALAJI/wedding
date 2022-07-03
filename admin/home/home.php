<?php
include '../includes/session.php';
include '../includes/header.php'; ?>

<?php include '../includes/navbar.php'; ?>
<?php include '../includes/menubar.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> Home</li>
          <li class="active">Dashboard</li>
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

        <!-- /.row -->
        <div class="row">
          <!-- ./col -->
          <?php if ($admin['admin_view']) { ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                  $sql6 = "SELECT admin_id from admin Where admin_delete=0 AND admin_status=1";
                  $query6 = $conn->prepare($sql6);;
                  $query6->execute();
                  $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                  $query = $query6->rowCount();
                  $sql2 = "SELECT admin_id from admin Where admin_delete=0 AND admin_status=0";
                  $query2 = $conn->prepare($sql2);;
                  $query2->execute();
                  $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                  $query1 = $query2->rowCount();
                  echo "<h6>Active Admin's: " . htmlentities($query) . "</h6>";
                  echo "<h6>In-Active Admin's: " . htmlentities($query1) . "</h6>";
                  echo "<h6>Total Admin's: " . htmlentities($query1 + $query) . "</h6>";
                  ?>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="../admin/admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php } ?>

          <?php if ($admin['call_logs_view']) { ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-gray">
                <div class="inner">
                  <?php
                  date_default_timezone_set('Asia/Kolkata');
                  $today = date('d-m-Y');
                  $sql6 = "SELECT * FROM call_logs WHERE call_logs_date='$today'";
                  $query6 = $conn->prepare($sql6);;
                  $query6->execute();
                  $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                  $query = $query6->rowCount();
                  echo "<h3>" . $query . "</h3>";
                  ?>
                  <div class="stat-panel-title text-uppercase">Todays Call Logs</div>
                </div>
                <div class="icon">
                  <i class="fa fa-phone"></i>
                </div>
                <a href="../call_logs/call_logs.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php } ?>

          <?php if ($admin['invitation_view']) { ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  $sql6 = "SELECT invitation_id from invitation Where invitation_deleted='0'";
                  $query6 = $conn->prepare($sql6);;
                  $query6->execute();
                  $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                  $query = $query6->rowCount();
                  echo "<h3>" . $query . "</h3>";
                  ?>
                  <div class="stat-panel-title text-uppercase">Total Invitation's</div>
                </div>
                <div class="icon">
                  <i class="fa fa-handshake-o"></i>
                </div>
                <a href="../invitation/invitation.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php } ?>
          <?php if ($admin['photographer_view']) { ?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <?php
                  $sql6 = "SELECT photographer_id from photographer Where photographer_deleted='0'";
                  $query6 = $conn->prepare($sql6);;
                  $query6->execute();
                  $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                  $query = $query6->rowCount();
                  echo "<h3>" . $query . "</h3>";
                  ?>
                  <div class="stat-panel-title text-uppercase">Total Photographer's</div>
                </div>
                <div class="icon">
                  <i class="fa fa-camera"></i>
                </div>
                <a href="../photographer/photographer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <?php } ?>
        </div>
    </div>

  </div>
  </section>
  </div>
  </div>
  <?php include '../includes/scripts.php'; ?>
</body>
<?php include '../includes/req_end.php'; ?>

</html>