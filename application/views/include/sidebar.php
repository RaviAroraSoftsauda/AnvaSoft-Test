 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="height: 52px;">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo @$_SESSION['username']; ?></p>
           <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="">
			<a href="<?php echo site_url('Site/index'); ?>">
            <i class="fa fa-dashboard"></i>  <span style="text-transform: uppercase;">Dashboard</span>
           <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
		</li>
     <li class="">
          <a href="<?php echo site_url('site/location_master'); ?>">
            <i class="fa fa-plus"></i><span style="text-transform: uppercase;">Location</span>
          <!--   <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
            <!--  <ul class="treeview-menu">
                <li><a href="<?php echo site_url('site/user_master'); ?>"><i class="fa fa-plus"></i>User Master</a></li> 
              </ul>  -->
        </li>
        <li class="">
          <a href="<?php echo site_url('site/master'); ?>">
            <!-- fa fa-cog -->
            <i class="fa fa-plus"></i><span style="text-transform: uppercase;">Customer</span>
          <!--   <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
            <!--  <ul class="treeview-menu">
                <li><a href="<?php echo site_url('site/user_master'); ?>"><i class="fa fa-plus"></i>User Master</a></li> 
              </ul>  -->
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>