
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <!-- Main content -->
     <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data</h3>

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
                    'name'=>'addData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open_multipart('admin/editUkm/'.$ukm->kode_ukm,$name);
            ?>
		
				     <div class="form-group">
                 <label for="kategori" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
				             <input name="nama_ukm" class="form-control" value="<?php echo $ukm->nama_ukm ?>" placeholder="Nama">
                    </div>
				      </div>
              
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Gambar</label>
                <div class="col-sm-9">
                  <input type="file" id="gambar" name="gambar" class="form-control" placeholder="Nama Bantuan">
                  <?php echo form_error('gambar');?>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Visi</label>
                <div class="col-sm-9">
                <textarea id="editor1" name="visi" rows="5" cols="100"><?php echo $ukm->visi ?></textarea>
                  <?php echo form_error('visi');?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Misi</label>
                <div class="col-sm-9">
                <textarea id="editor1" name="misi" rows="5" cols="100"><?php echo $ukm->misi ?></textarea>
                  <?php echo form_error('misi');?>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-sm-3 control-label">Sejarah</label>
                <div class="col-sm-9">
                <textarea id="editor1" name="sejarah" rows="8" cols="100"><?php echo $ukm->sejarah ?></textarea>
                  <?php echo form_error('sejarah');?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-2">
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Simpan</button>
                </div>
              </div>
			</form>
            </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

    </section>
    <!-- /.content -->
</div>
	<script type="text/javascript">
		$(document).ready(function(){

		    $('#title').autocomplete({
                source: "<?php echo site_url('kondisi/get_autocomplete');?>",
     
                select: function (event, ui) {
                    $('[name="title"]').val(ui.item.label); 
                    $('[name="NAMA"]').val(ui.item.NAMA); 
                }
            });

		});
	</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#menu-ukm").addClass("active");
    $('#table').DataTable({
        responsive: true
    });
});
</script>

<script type="text/javascript">
  function functionDelete(url){
    swal({
      title: 'Apakah Anda data?',
      text: "Anda akan menghapus Data",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, gagalkan!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function () {
        swal("Terhapus!", "Anda telah mengapus data", "success");
        window.location = url;

    }, function (dismiss) {
      // dismiss can be 'cancel', 'overlay',
      // 'close', and 'timer'
      if (dismiss === 'cancel') {
        swal("Cancelled", "Anda tidak jadi menghapus groups", "error")
      }

    });
}
</script>
