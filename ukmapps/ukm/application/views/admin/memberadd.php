
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($this->session->flashdata('info')){?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>
            <br />
            <?php echo form_open('admin/memberadd');?>
             
              <div class="form-group">
                            <label for="username">NIM</label>
                            <input type="text" name="username" class="form-control" required oninvalid="setCustomValidity('Username Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan NIM" >
                                   <?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('username');?>
             <div class="form-group">
                      <label for="username">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" required oninvalid="setCustomValidity('Username Harus di Isi !')"
                             oninput="setCustomValidity('')" placeholder="Masukan Nama Lengkap" >
                             <?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
                      </div>
                      <?php echo form_error('username');?>

           <div class="form-group">
                <label for="prodi">Prodi</label>
          
                     <select name="id_prodi" id="nama_kategori" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">--Pilih Prodi--</option>
                    <?php foreach($prodi as $k):?>
                      <option  value="<?php echo $k->id_prodi;?>"><?php echo $k->nama_prodi;?></option>
                   <?php endforeach;?> 
              </select>
              </div>

              <div class="form-group">
                <label for="prodi">Semester</label>
          
                     <select name="semester" id="semester" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">--Semester--</option>
                 
                      <option  value="1">1</option>
                        <option  value="2">2</option>
                        <option  value="3">3</option>
                        <option  value="4">4</option>
                        <option  value="5">5</option>
                        <option  value="6">6</option>
                        <option  value="7">7</option>
                        <option  value="8">8</option>
             
              </select>
              </div>
           <div class="form-group">
                  <label>Alamat</label>
                  <input name="alamat" value="" placeholder="Masukan Alamat" class="form-control">
                  <p class="help-block"></p>
              </div>
              <?php echo form_error('alamat');?>

            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input name="tempat_lahir" value="" placeholder="Masukan Alamat" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('tempat_lahir');?>
                      <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="" placeholder="Masukan Alamat" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('alamat');?>


            <div class="form-group">
                <label for="prodi">Jenis Kelamin</label>
          
                     <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">--Jenis Kelamin--</option>
                 
                      <option  value="Laki-laki">Laki-laki</option>
                        <option  value="Perempuan">Perempuan</option>
              </select>
              </div>
                <div class="form-group">
                <label for="prodi">Agama</label>
          
                     <select name="agama" id="nama_kategori" class="form-control" data-live-search="true">
                   <option style="margin: 50px;" class="selectpicker form-control">--Agama--</option>
                 
                      <option  value="Islam">Islam</option>
                        <option  value="Katholik">Katholik</option>
                        <option  value="Kristen">Kristen</option>
                        <option  value="Hindu">Hindu</option>
                        <option  value="Budha">Budha</option>
                        <option  value="Konghucu">Konghucu</option>
             
              </select>
              </div>
              <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required oninvalid="setCustomValidity('Password Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Password " >
                                   <?php echo form_error('password', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('password');?>


             <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required oninvalid="setCustomValidity('Email Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Email" >
                                   <?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('email');?>

<!-- 
              <div class="form-group">
                            <label for="first_name">Nama Depan</label>
                            <input type="text" name="first_name" class="form-control" required oninvalid="setCustomValidity('Nama Depan Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Depan " >
                                   <?php echo form_error('first_name', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('first_name');?>


              <div class="form-group">
                            <label for="last_name">Nama Belakang</label>
                            <input type="text" name="last_name" class="form-control" required oninvalid="setCustomValidity('Nama Belakang Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Belakang " >
                                   <?php echo form_error('last_name', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('last_name');?>
 -->
              <div class="form-group">
                            <label for="phone">No Handphone</label>
                            <input type="number" name="phone" class="form-control" required oninvalid="setCustomValidity('No Handphone Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan No Handphone" >
                                   <?php echo form_error('phone', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('phone');?>


                   
                           <!--  <script>
            function show(){
                var group = document.getElementById("groups").value;
                if(group==6){
                    $("#divnokk").hide();
                    $("#divrw").show();
                    $("#divrt").hide();
                    $("#divnorumah").hide();
                    $("#divalamat").hide();
                    $("#divphone").hide();
                } else if(group==5){
                    $("#divnokk").hide();
                    $("#divrw").show();
                    $("#divrt").show();
                    $("#divnorumah").hide();
                    $("#divalamat").hide();
                    $("#divphone").hide();
                } else if(group==2){
                    $("#divnokk").show();
                    $("#divrw").show();
                    $("#divrt").show();
                    $("#divnorumah").show();
                    $("#divalamat").show();
                    $("#divphone").show();
                } else{
                    $("#divnokk").hide();
                    $("#divrw").hide();
                    $("#divrt").hide();
                    $("#divnorumah").hide();
                    $("#divalamat").hide();
                    $("#divphone").hide();
                }
            }
        </script>

         <div id="divnokk" class="form-group" style="display:none;">
                                <label>No KK</label>
                                <input name="no_kk" value="" placeholder="Masukan No KK" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('no_kk');?>

        <div id="divrw" class="form-group" style="display:none;">
                                <label>RW</label>
                                <input name="rw" value="0" placeholder="Masukan RW" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('rw');?>

        <div id="divrt" class="form-group" style="display:none;">
                                <label>RT</label>
                                <input name="rt" value="0" placeholder="Masukan RT" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('rt');?>

        

        <div id="divnorumah" class="form-group" style="display:none;">
                                <label>No Rumah</label>
                                <input name="no_rumah" value="" placeholder="Masukan No Rumah" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('no_rumah');?> 

        <div id="divphone" class="form-group" style="display:none;">
                                <label>No Hp</label>
                                <input name="phone" value="" placeholder="Masukan No HP" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('phone');?> -->


              <div class="box-footer">
                  <button type="submit" name="Submit" value="submit" class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>&nbsp;
                  <a href="<?php echo base_url('admin/member');?>" class="btn btn-warning">Kembali</a>
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
<!-- /.content-wrapper -->

