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

    <div class="row">
        <div class="col-md-4">
            <div class="card prod-p-card card-green">
                <div class="card-body">
                    <div class="row align-items-center mb-25">
                        <div class="col">
                            <h6 class="mb-5 text-white">Total Saldo</h6>
                            <h3 class="mb-0 fw-500 text-white"> <?php echo moneyFormat($get?$get->total_saldo:0) ?> </h3>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-money-bill-alt text-green f-25"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-white"><?php echo $client->nama ?></p>
                </div>
            </div>        
        </div>
        <div class="col-md-4">
            <div class="card proj-t-card">
                <div class="card-body" style="padding: 25px;">
                    <div class="row align-items-center mb-30">
                        <div class="col-auto">
                            <i class="fas fa-paper-plane text-blue f-30"></i>
                        </div>
                        <div class="col pl-0">
                            <h6 class="mb-5">Progres Menabung Anda</h6>
                            <h6 class="mb-0 text-blue"><?php echo round($persen,1) ?>% dari Target Menabung</h6>
                        </div>
                    </div>
                    <div class="row align-items-center text-center">
                        <div class="col-5">
                            <h6 class="mb-0"> <?php echo moneyFormat($get?$get->total_saldo:0) ?> </h6></div>
                        <div class="col-2"><i class="fas fa-exchange-alt text-green f-18"></i></div>
                        <div class="col-5">
                            <h6 class="mb-0">Rp. 24.000.000,-</h6></div>
                    </div>
                    <h6 class="pt-badge bg-blue"><?php echo round($persen,1) ?>%</h6>
                </div>
            </div>  
        
        </div>
        <div class="col-md-4">
            <div class="card prod-p-card card-red">
                <div class="card-body text-white">
                    <div class="row align-items-center mb-18">
                        <div class="col">                            
                            <h6>Paket Menabung Anda</h6>
                            <h5><?php echo $client->paket ?> Bulan</h5>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock text-orange f-25"></i>
                        </div>
                    </div>
                    <div class="progress mt-3 mb-1" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $round ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="text-white f12">
                        <span>Berjalan <?php echo $num ?> bulan</span>
                        <span class="float-right">dari <?php echo $client->paket ?> bulan</span>
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
                            <!-- <div class="row pt-20 pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-primary update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Devlopment &amp; Update</h6></a>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, <a href="#!" class="text-blue"> More</a></p>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-primary update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Showcases</h6></a>
                                    <p class="text-muted mb-0">Lorem dolor sit amet, <a href="#!" class="text-blue"> More</a></p>
                                </div>
                            </div> -->
                            <?php foreach ($last_transaksi as $data) { ?>
                            <div class="row pt-10 pb-20">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-success update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <h6><?php echo date('d M - H:i:s', strtotime($data->date)) ?></h6>
                                    <p class="text-muted mb-0"><?php echo $data->kode_transaksi ?> ~ <span class="text-primary"><?php echo $data->tipe_bayar ?></span>- <?php echo moneyFormat($data->amount) ?> </p>
                                </div>
                            </div>
                            <?php } ?>                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>