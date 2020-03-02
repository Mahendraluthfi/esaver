<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | E-Saver</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?php echo base_url() ?>assets/icon.png" type="image/x-icon" />
        

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/theme.min.css">
        <script src="<?php echo base_url() ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('<?php echo base_url() ?>assets/img/pic1.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="text-center">
                                <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="" height="70"></a>
                            </div><br>
                            <!-- <img src="<?php echo base_url() ?>assets/img/logo.png" alt="" height="70"> -->
                            <h3 class="text-center">Sign In to E-Saver</h3>                            
                            <h3 class="text-center">PT. TSURAIYA TRAVEL</h3> 
                            <?php echo $this->session->flashdata('msg'); ?>                           
                            <?php echo form_open('login/submit'); ?>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                    <i class="ik ik-lock"></i>
                                </div>                                
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-theme">Sign In</button>
                                </div>
                            <?php echo form_close(); ?>
                            <!-- <div class="register"> -->
                                <!-- <p><a href="register.html">Forgot Password ?</a></p> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="<?php echo base_url() ?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
