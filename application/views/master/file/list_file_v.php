 <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 
 <div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List file
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php  echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php  echo base_url(); ?>Indikator/listIndikator/<?php echo $kriteria; ?>"><i class="fa fa-dashboard"></i> List Indikator</a></li>
       
        <li class="active">List  file</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data File</h3>&nbsp;&nbsp;
              
            </div>
            <!-- /.box-header -->
             <?php $warning = $this->session->flashdata('warning');
              if (!empty($warning)){ ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?php echo $warning ?>
                </div>
            <?php } ?>   
             <?php $success = $this->session->flashdata('success');
              if (!empty($success)){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $success ?>
                </div>
            <?php } ?>   
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                        <tr>
                            <th>No</th>                         
                            <th>Nama Indikator</th> 
                            <th>Nomor</th>                                             
                            <th>Nama</th>                                             
                            <th>Deskripsi</th>
                            <th>Tahun</th>
                            <th>File</th>                                                                        
                            <th>Tipe File</th>                                                                        
                            <th>View</th>                                                                        
                                                      
                        </tr>
                    </thead>
                 
                    <tbody>
                        <?php $no=1; foreach ($file as $row) { ?>
                  
                        <tr> 
                            <td> <?php echo $no; ?></td>
                             <td> <?php echo $row->NAMA_INDIKATOR; ?> </td> 
                             <td> <?php echo $row->NOMOR; ?> </td> 
                            <td> <?php echo $row->NAMA; ?></td>
                            <td> <?php echo $row->DESKRIPSI; ?></td>
                            <td> <?php echo $row->TAHUN; ?></td>
                                                      
                            <td> <?php echo $row->FILE; ?> </td>                            
                            <td> <?php echo $row->TIPE_FILE; ?> </td>                            
                            <td>
                              <?php if ($row->TIPE_FILE == 'pdf') { ?>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                 <i class="fa fa-search"> Lihat File PDF</i>
                              </button>
                              <div class="modal fade" id="modal-default">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">File PDF</h4>
                                  </div>
                                  <div class="modal-body">
                                    <embed src="<?php echo base_url() ?>assets/file_pdf/<?php echo $row->FILE; ?>" type="application/pdf"   height="700px" width="500">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                              <?php  } else { ?>
                                <a href='<?php echo base_url() ?>assets/file_pdf/<?php echo $row->FILE; ?>' target='__blank'>Download File Excel</a>
                              <?php  } ?>
                             
                              </td>                            
                                             
                        </tr>   

                       <?php $no++; } ?>
                                     

                    </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>