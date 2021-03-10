  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <!-- Main content -->
     <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Bantuan</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div> 
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>

            <?php
                $name = array(
                    'name'=>'editBerita',
                    'class'=>'form-horizontal'
                    );  
                echo form_open_multipart('admin/editProdi/'.$prodi->id_prodi,$name);
            ?>

          
      
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Prodi</label>
                <div class="col-sm-9">
                  <input type="text" id="nama_prodi" name="nama_prodi" value="<?php echo $prodi->nama_prodi?>" class="form-control">
                  <?php echo form_error('nama_prodi');?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Update</button>
                  <a href="<?php echo base_url('admin/prodi');?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
              </div>
            </form>    
 
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>
    </section>
    </div>

    
<script type="text/javascript">
  $(document).ready(function() {
    $("#menu-prodi").addClass("active");
});
</script>