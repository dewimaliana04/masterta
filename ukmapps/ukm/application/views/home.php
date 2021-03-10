<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <style type="text/css">
                body{
                    background-image: url(<?php echo base_url()?>images/bckgweb.jpg);
                }

            </style>
            
    <title>Aplikasi Ronda OnLine</title>

    <link rel="shorcut icon" href="<?php echo base_url('images/roline24x24.png');?>" types="images/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assest/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assest/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assest/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assest/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        @media screen and (max-width: 768px) {
            #download{
                display:none;
            }
        }
    </style>
</head>
<body>
<div align="center">
    

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img src="<?php echo base_url('images/logo.png');?>" alt="RoLine" style="width:180px;height:150px;margin-top:50%;">
                <h1 style="color:#fff;margin-top:0px;">Welcome to Doraemon Website</h1>
                <a href="<?php echo base_url('login');?>" class="btn btn-warning"><i class="fa fa-sign-in"></i> Login</a>
                <a href="https://drive.google.com/open?id=0B0MDOXvE-RqSMC1seVBqdUlRQms" id="download" class="btn btn-info"><i class="fa fa-download"></i> Download App</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assest/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assest/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assest/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assest/dist/js/sb-admin-2.js"></script>

</body>

</html>
