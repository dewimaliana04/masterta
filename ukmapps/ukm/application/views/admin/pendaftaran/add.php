
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <!-- Main content -->
     <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Kondisi Kesehatan</h3>

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
                echo form_open_multipart('kondisi/addKondisi/',$name);
            ?>
				      <div class="form-group">
                 <label for="kategori" class="col-sm-3 control-label">Nik</label>
                <div class="col-sm-9">
				         <input type="text" name="NIK" class="form-control" id="title" placeholder="Nik">
				     </div>
            </div>
				     <div class="form-group">
                 <label for="kategori" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
				             <input name="NAMA" class="form-control" placeholder="Nama" readonly>
                    </div>
				      </div>

              <div  class="form-group">
                    <label for="kategori" class="col-sm-3 control-label"> Kondisi Kesehatan</label>
                <div class="col-sm-9">
                        <select name="NAMA_KONDISI" class="form-control">
                            <option value="">-- Pilih kondisi --</option>
                            <option  value="Sehat Mandiri">Sehat Mandiri</option>
                            <option  value="Sehat Tidak Mandiri">Sehat Tidak Mandiri</option>
                            <option value="Kurang Sehat Mandiri">Kurang Sehat Mandiri</option>
                            <option value="Kurang Sehat Tidak Mandiri">Kurang Sehat Tidak Mandiri</option>
                        </select>
                        <?php echo form_error('jenis_bantuan');?>
                </div>
              </div>
    <div  class="form-group">
                    <label for="kategori" class="col-sm-3 control-label"> Status</label>
                <div class="col-sm-9">
                        <select name="STATUS" class="form-control">
                            <option value="">-- Pilih status --</option>
                            <option  value="1">Hidup</option>
                            <option  value="2">Meninggal</option>
                        </select>
                        <?php echo form_error('STATUS');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Info Lingkungan</label>
                <div class="col-sm-9">
                  <input type="text" id="LINGKUNGAN" name="LINGKUNGAN" class="form-control" placeholder="Lingkungan">
                  <?php echo form_error('LINGKUNGAN');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Latitude</label>
                <div class="col-sm-9">
                  <input type="text" id="LTU" name="LTU" class="form-control" placeholder="Latitude (Contoh -6.85742)">
                  <?php echo form_error('LTU');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Longitude</label>
                <div class="col-sm-9">
                  <input type="text" id="LAT" name="LAT" class="form-control" placeholder="Longitude (Contoh 109.14068)">
                  <?php echo form_error('LAT');?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Foto Pribadi</label>
                <div class="col-sm-9">
                  <input type="file" id="FOTO_PRIBADI" name="FOTO_PRIBADI" class="form-control" placeholder="Nama Bantuan">
                  <?php echo form_error('FOTO_PRIBADI');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Foto Rumah</label>
                <div class="col-sm-9">
                  <input type="file" id="FOTO_RUMAH" name="FOTO_RUMAH" class="form-control" placeholder="Keterangan">
                  <?php echo form_error('FOTO_RUMAH');?>
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
    $("#menu-kondisi").addClass("active");
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
