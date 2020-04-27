<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard | Staff</title>
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
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/loader.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/dist/css/select2.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">   
        <script src="<?php echo base_url() ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="loader">
            <div class="loader-inner">
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="" height="35"></a>                       
                            <h5 style="margin-left: 10px; ">PT. Tsuraiya Travel</h5>
                        </div>
                        <div class="top-menu d-flex align-items-center">                            
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php echo base_url() ?>assets/img/user.jpg" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <!--     <a class="dropdown-item" href="../profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a> -->
                                    <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <div class="logo-img">
                               <img src="<?php echo base_url() ?>assets/icon.png" height="30" style="margin-bottom: 4px;" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">E-Saver</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">                                
                                <div class="nav-item">
                                    <a href="<?php echo site_url('staff/dashboard') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>  
                                <!-- <div class="nav-lavel">Pengguna</div>
                                <div class="nav-item">
                                    <a href="../../index.html"><i class="ik ik-user-check"></i><span>Staff</span></a>
                                    <a href="../../index.html"><i class="ik ik-users"></i><span>Client</span></a>
                                </div> -->
                                <div class="nav-lavel">Fitur</div>
                                <div class="nav-item">
                                    <a href="<?php echo site_url('staff/transaksi') ?>"><i class="ik ik-repeat"></i><span>Transaksi</span></a>                                    
                                </div>                                 
                               <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-upload-cloud"></i><span>Export / Import</span></a>
                                    <div class="submenu-content">
                                        <a href="<?php echo base_url('staff/export') ?>" class="menu-item">Data Jamaah</a>
                                        <!-- <a href="#" class="menu-item">Data Transaksi</a>                                         -->
                                    </div>
                                </div>       
                                <div class="nav-lavel">Laporan</div>
                                <div class="nav-item">
                                    <a href="<?php echo base_url('staff/laporan') ?>"><i class="ik ik-file-text"></i><span>Laporan Transaksi</span></a>                                    
                                </div> 
                                 <div class="nav-item">
                                    <a href="<?php echo base_url('staff/mutasi') ?>"><i class="ik ik-git-pull-request"></i><span>Cek Mutasi</span></a>
                                </div> 
                                <div class="nav-lavel">Pengaturan</div>
                                <div class="nav-item">
                                <?php 
                                    $cek = $this->db->get_where('saldo', array('total_saldo >=' => '24000000', 'verifikasi' => '0'))->num_rows();
                                 ?>

                                    <a href="<?php echo base_url('staff/reminder') ?>"><i class="ik ik-bell"></i><span>Reminder Saldo</span><span class="badge badge-danger"><?php echo $cek; ?></span></a>

                                </div>

                            </nav>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                        <?php $this->load->view($content); ?>
                    </div>
                </div>

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 Cerations.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Developed by <a href="http://cerations.com/" class="text-dark" target="_blank">Cerations</a></span>
                    </div>
                </footer>
            </div>
        </div>

        
        <script src="<?php echo base_url() ?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/theme.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/datatables.js"></script>              
        <script src="<?php echo base_url() ?>assets/plugins/select2/dist/js/select2.min.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
             setTimeout(function(){        
                $('.loader').fadeOut();
                $('.loader-inner').delay(150).fadeOut('slow'); 
            }, 1000);
            $(".select2").select2();
        

          $(function() {
            $('.file-upload-browse').on('click', function() {
              var file = $(this).parent().parent().parent().find('.file-upload-default');
              file.trigger('click');
            });
            $('.file-upload-default').on('change', function() {
              $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
            });
          });
        </script>
    </body>
</html>
