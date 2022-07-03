<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['admin_photo'])) ? '../../images/' . $admin['admin_photo'] : '../../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['admin_name']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="../home/home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php
      if ($admin['invitation_view'] || $admin['photographer_view']) { ?>
      <li class="header">MANAGE</li>
      <?php } ?>
      <?php
      if ($admin['invitation_view']) { ?>
        <li><a href="../invitation/invitation.php"><i class="fa fa-handshake-o"></i> <span>Invitation</span></a></li>
      <?php } ?>

      <?php
      if ($admin['photographer_view']) { ?>
        <li><a href="../photographer/photographer.php"><i class="fa fa-camera-retro"></i> <span>Photographer</span></a></li>
      <?php } ?>
      <?php
      if ($admin['call_logs_view']) { ?>
      <li class="header">CALL LOG'S</li>
      <?php } ?>
      <?php
      if ($admin['call_logs_view']) { ?>
        <li><a href="../call_logs/call_logs.php"><i class="fa fa-phone-square"></i> <span>Call Logs</span></a></li>
      <?php } ?>
      <?php
      if ($admin['admin_view']) { ?>
      <li class="header">LOGIN'S</li>
      <?php } ?>
      <?php
      if ($admin['admin_view']) { ?>
        <li><a href="../admin/admin.php"><i class="fa fa-grav"></i> <span>Admin</span></a></li>
      <?php } ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>