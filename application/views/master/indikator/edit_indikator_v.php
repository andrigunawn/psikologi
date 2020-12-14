  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/all.css">
<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">

 <div class="content-wrapper">


   
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data pekerjaan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Dashbord"><i class="fa fa-dashboard"></i> Dashbord</a></li>      
        <li class="active">Edit Data pekerjaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Data pekerjaan</h3>
            </div>
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
                    <h4><i class="icon fa fa-success"></i> Success!</h4>
                    <?php echo $success ?>
                </div>
            <?php } ?>   
            <div class="box-body"> 

              <!-- Date dd/mm/yyyy -->
             <form class="form-horizontal" method="post" action="<?php echo base_url()?>pekerjaan/simpanUpdate">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="judul" class="col-sm-4 control-label" >judul Pekerjaan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $pekerjaan->data->judul;?>" placeholder="Masukkan judul pekerjaan">
                           <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $pekerjaan->data->id;?>" placeholder="Masukkan nama pekerjaan">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="deskripsi" class="col-sm-4 control-label" >Deskripsi Pekerjaan</label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"><?php echo $pekerjaan->data->deskripsi;?></textarea> 
                        </div>
                      </div>   
                       <div class="form-group">
                        <label for="tarif" class="col-sm-4 control-label" >Honor Pekerjaan</label>
                        <div class="col-sm-8">
                           <input type="number" class="form-control" id="tarif" name="tarif" placeholder="Masukkan pekerjaan" value="<?php echo $pekerjaan->data->tarif;?>"> 
                        </div>
                      </div>      
                      <div class="form-group">
                        <label for="waktu" class="col-sm-4 control-label" >Waktu Pengerjaan (hari)</label>
                        <div class="col-sm-8">
                           <input type="number" class="form-control" id="waktu" name="waktu" placeholder="Masukkan pekerjaan" value="<?php echo $pekerjaan->data->waktu;?>"> 
                        </div>
                      </div> 
                     
                     
                     
                     
                
                  </div>                  
                </div>               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" value="1" class="btn btn-primary btn-lg btn-flat pull-right">Simpan</button>
                 <a href="<?php echo base_url() ?>pekerjaan"  class="btn btn-default btn-lg btn-flat pull-right">Batal</a>
              </div>
              <!-- /.box-footer -->
            </form>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>


  <div id='ResponseInput'></div>


<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
  //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
</script>
