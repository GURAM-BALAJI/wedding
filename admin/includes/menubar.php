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
      <li class="header">REPORTS</li>
      <li><a href="../home/home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php if ($admin['contact_view']) { ?>
        <li class="header">REQUESTS</li>
      <?php } ?>
      <?php if ($admin['contact_view']) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-phone"></i>
            <span>Contacts</span> <b style="color:RED;"> <?php
                                                          foreach ($conn->query('SELECT COUNT(*) FROM contact WHERE contact_view=0') as $row) {
                                                            if ($row['COUNT(*)'] != 0)
                                                              echo $row['COUNT(*)'];
                                                          } ?></b>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../contact/contact.php"><i class="fa fa-eye-slash"></i> New Contact</a></li>
            <li><a href="../contact/contact_view.php"><i class="fa fa-eye"></i> Viewed Contact</a></li>
          </ul>
        </li>
      <?php } ?>
      
      <li class="header">MANAGE</li>
      <?php 
      if ($admin['admin_view']) { ?>
        <li><a href="../admin/admin.php"><i class="fa fa-grav"></i> <span>Admin</span></a></li>
      <?php } ?>
      
      <?php 
      if ($admin['invitation_view']) { ?>
        <li><a href="../invitation/invitation.php"><i class="fa fa-snowflake-o"></i> <span>Invitation</span></a></li>
      <?php } ?>

      <?php 
      if ($admin['photographer_view']) { ?>
        <li><a href="../photographer/photographer.php"><i class="fa fa-camera-retro"></i> <span>Photographer</span></a></li>
      <?php } ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>