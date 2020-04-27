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
            <div class="col-md-4">
            <div class="card latest-update-card">
                <div class="card-header">
                    <h3>Transaksi Terakhir</h3>                    
                </div>
                <div class="card-block">
                    <div class="scroll-widget">
                        <div class="latest-update-box">                          
                            <?php foreach ($last_transaksi as $data) { ?>
                            <div class="row pt-10 pb-20">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-success update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <h6><?php echo date('d M - H:i:s', strtotime($data->date)) ?></h6>
                                    <p class="text-muted mb-0"><?php echo $data->kode_transaksi ?> <?php echo $data->nama ?>~ <span class="text-primary"><?php echo $data->tipe_bayar ?></span>- <?php echo moneyFormat($data->amount) ?> </p>
                                </div>
                            </div>
                            <?php } ?>                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>         
        </div>