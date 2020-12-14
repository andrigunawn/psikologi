<?php
  $data = $this->session->userdata('logged_in');
 


 ?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/img/profil/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="padding-bottom: 100px">
          <p>Tim</p>
          Admin
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
      
     
       <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
          <a  href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>         
          </a>
        </li>       
       <?php 
       $icon = array('bank','list','graduation-cap','group','dollar','globe','binoculars','tree','trophy');
       $i=0;
       foreach ($kriteria2 as $row) { ?>
          <li class="<?php echo $this->uri->segment(3) == $row->ID_DATA ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>Indikator/listIndikator/<?php echo $row->ID_DATA ?>">
            <i class="fa  fa-<?php echo $icon[$i]; ?>"></i> <span><?php echo $row->NAMA ?></span>
            
          </a>
        </li>
         
      <?php $i++;} ?>
        
      
        
       
       
       
     
    




     
     
        
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>