<?php
  $data = $this->session->userdata('logged_in');
 


 ?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/img/profil/<?php echo $data->username; ?>.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $data->nama;  ?></p>
          <?php echo $data->nama_grup;  ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
      <?php if ($data->nama_grup == 'superadmin') {?>
     
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
          <a  href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>         
          </a>
        </li>       
       
        <li class="treeview <?php echo ($this->uri->segment(1) == 'Pekerjaan' ) ? 'active menu-open' : ''; ?>">
          <a href="#">
            <i class="fa fa-list"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(1) == 'Pekerjaan' ? 'active' : ''; ?>"><a href="<?php echo base_url();?>Pekerjaan"><i class="fa fa-circle-o"></i> Pekerjaan</a></li>            
          </ul>
        </li>      
      
        <li class="<?php echo $this->uri->segment(1) == 'User' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>User">
            <i class="fa  fa-user-plus"></i> <span>Pengaturan Akun</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>login/logout">
            <i class="fa  fa-sign-out"></i> <span>Log Out</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
       
       
       
     
     <?php } ?>

     <!-- ------------------------------------------------------------------------------------------------ -->
     <!-- ------------------------------------------------------------------------------------------------ -->

      <?php if ($data->nama_grup == 'perusahaan') {?>
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
          <a  href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>         
          </a>
        </li>        
        <li class="treeview <?php echo ($this->uri->segment(1) == 'Pekerjaan' ) ? 'active menu-open' : ''; ?>">
          <a href="#">
            <i class="fa fa-list"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(1) == 'Pekerjaan' ? 'active' : ''; ?>"><a href="<?php echo base_url();?>Pekerjaan"><i class="fa fa-circle-o"></i> Pekerjaan</a></li>            
          </ul>
        </li>   
      
        <li>
          <a href="<?php echo base_url(); ?>login/logout">
            <i class="fa  fa-sign-out"></i> <span>Log Out</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
       
       
       
    <?php } ?>

    
    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

      <?php if ($data->nama_grup == 'freelancer') {?>
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
          <a  href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>         
          </a>
        </li>      
        
       
        <li>
          <a href="<?php echo base_url(); ?>login/logout">
            <i class="fa  fa-sign-out"></i> <span>Log Out</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
       
     <?php } ?>


     
     
        
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>