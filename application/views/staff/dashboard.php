<div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-home bg-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>Ringkasan Informasi Sistem E-Saver</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>"><i class="ik ik-home"></i> Dashboard</a>
                        </li>                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row clearfix">
            <div class="col-md-4">
                <div class="widget bg-primary">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Staff</h6>
                                <h2><?php echo $staff ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget bg-success">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Jamaah</h6>
                                <h2><?php echo $client ?></h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget bg-warning">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Transaksi</h6>
                                <h2><?php echo $transaksi ?></h2>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money-bill-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>