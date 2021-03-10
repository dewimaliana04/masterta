
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile
      <small>Profile Admin Go-Farms</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-user"></i>Profile</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Update Profile</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            

             
              
              
<div class="row">
                <div class="col-lg-12">
                <?php if($this->session->flashdata('info')){?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Data Profile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <div class='box-header with-border'>
                                        <?php echo form_open('admin/changeProfile/'.$user->id);?>


                                        <div class="box-body">
                                        <div class="form-group">
                                            <label for="disabledSelect">ID</label>
                                            <input class="form-control" name="id" value="<?php echo $user->id?>" id="disabledInput" type="text" placeholder="ID" disabled>
                                        </div>
                                        <?php echo form_error('id');?>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control" placeholder="Ubah Username Member" disabled>
                                                   <?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
                                        </div>
                                        <?php echo form_error('username');?>
                               
                                        <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" value="<?php echo $user->email ?>" type="email" placeholder="Ubah Email" class="form-control">
                                                <p class="help-block"></p>
                                        </div>
                                        <?php echo form_error('email');?>

                                        <div class="form-group">
                                                <label>Nama Depan</label>
                                                <input name="first_name" value="<?php echo $user->first_name ?>" type="text" placeholder="Nama Depan" class="form-control">
                                                <p class="help-block"></p>
                                        </div>
                                        <?php echo form_error('first_name');?>

                                        <div class="form-group">
                                                <label>Nama Belakang</label>
                                                <input name="last_name" value="<?php echo $user->last_name ?>" type="text" placeholder="Nama Belakang" class="form-control">
                                                <p class="help-block"></p>
                                        </div>
                                        <?php echo form_error('last_name');?>

                                         <div class="form-group">
                                                <label>No Handphone</label>
                                                <input name="phone" value="<?php echo $user->phone?>" type="text" placeholder="Nama Belakang" class="form-control">
                                                <p class="help-block"></p>
                                        </div>
                                        <?php echo form_error('phone');?>


                                            <div class="box-footer">
                                                 <button type="submit" name="Submit" value="submit" class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                                               
                                            </div>
                                        </div>
                                    </form>
                                </table>     
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                <?php if($this->session->flashdata('infoPassword')){?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <div class='box-header with-border'>
                                    <?php echo form_open('admin/changePassword/'.$user->id);?>


                                       <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" value="" type="password" placeholder="password" class="form-control">
                                                <p class="help-block"></p>
                                        </div>
                                        <?php echo form_error('password');?>

                                        <div class="form-group">
                                                <label>Retype Password</label>
                                                <input name="r_password" value="" type="password" placeholder="password" class="form-control">
                                                <p class="help-block"></p>
                                        </div>
                                        <?php echo form_error('r_password');?>

                                            <div class="box-footer">
                                                <button type="submit" name="Submit" class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Ubah</button>
                                            </div>         
                                        </div>
                                    </form>
                                    </div>
                                </table>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>



          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

