
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <!-- Main content -->
     <section class="content container-fluid">

  
  <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div> 
      <!-- Default box -->
        <div class="box-body">
        <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>
        <a href="<?php echo base_url('admin/addKondisi');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
            <div class="table-responsive">
             <?php if($kondisi!=null){?>
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                    <?php } else { ?>
              <table width="100%" class="table table-striped table-bordered table-hover">
            <?php } ?>
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Kondisi Kesehatan</th>
                          <th>Lingkungan</th>
                      <!--     <th>Foto Pribadi</th>
                          <th>Foto Rumah</th> -->
                          <th style="text-align: center;">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php 
                  $no = 1;
                  if($kondisi!=null){
                    foreach($kondisi as $d){                  
                  ?>
                  <tr>
                       <td><?php echo $no++ ?></td>
                       <td><?php echo $d->NIK?></td>
                            <td><?php echo $d->NAMA?></td>
                        <td><?php echo $d->NAMA_KONDISI ?></td>
                        <td><?php echo $d->LINGKUNGAN ?></td>
                     <!--    <td> <img style="width: 50px;" src='<?= base_url().'uploads/pribadi/'.$d->FOTO_PRIBADI ?>'></td>
                        <td> <img style="width: 80px;" src='<?= base_url().'uploads/pribadi/'.$d->FOTO_RUMAH ?>'></td> -->
                        <td style="text-align: center;">
                         <a class='btn btn-info btn-xs' href="<?php echo base_url('kondisi/editKondisi/'.$d->KODE_KONDISI);?>" class=""><i class="glyphicon glyphicon-edit"></i> </a>
                         <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('kondisi/deleteKondisi/'.$d->KODE_KONDISI);?>')"><i class="glyphicon glyphicon-trash"></i> </a> 
              
                      </td>
                  </tr>
                  <?php }
                    } else { ?>
                    <tr>
                      <td class="text-center" colspan="9"><i>Tidak Ada Data</i></td>
                    </tr>
                  <?php } ?>
            </tbody>
              </table>
              </div>
              </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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
