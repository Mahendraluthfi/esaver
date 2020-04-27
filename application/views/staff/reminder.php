<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-users bg-blue"></i>
                <div class="d-inline">
                    <h5>Reminder Saldo</h5>
                    <span>Data Jamaah yang akan terverifikasi memenuhi saldo</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url() ?>"><i class="ik ik-home"></i> Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item active">
                        <i class="ik ik-git-pull-request"></i> Reminder Saldo
                    </li>                        
                </ol>
            </nav>
        </div>
    </div>
</div>
<style>
    .btn{
        padding: 5px;
    }
    .ik{
        margin-left: 5px;
    }
</style>
<div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
            <div class="widget-body bg-red text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Jamaah saldo < Rp. 24.000.000</h6>
                        <span>&nbsp;</span>
                        <h2><?php echo $minus ?></h2>
                    </div>
                    <div class="icon text-white">
                        <i class="ik ik-trending-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
            <div class="widget-body bg-yellow text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Jamaah saldo > Rp. 24.000.000 </h6>
                        <span>Belum Terverifikasi</span>
                        <h2><?php echo $plus ?></h2>
                    </div>
                    <div class="icon text-white">
                        <i class="ik ik-trending-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="widget">
            <div class="widget-body bg-success text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Jamaah Siap Berangkat </h6>
                        <span>Sudah Terverifikasi</span>
                        <h2><?php echo $oke ?></h2>
                    </div>
                    <div class="icon text-white">
                        <i class="ik ik-trending-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-block">
                <h5>Data Jamaah</h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Belum verifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Terverifikasi</a>
                        </li>                        
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                           
                                <div class="dt-responsive">
                                    <table id="simpletable"
                                           class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>User ID</th>
                                            <th>Tgl Daftar</th>
                                            <th>Nama Lengkap</th>
                                            <th>Saldo</th>
                                            <th>Paket</th>
                                            <th>Status</th>
                                            <th width="10%">#</th>                    
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($below as $data) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo substr($data->user_id, 0,18) ?></td>
                                                    <td><?php echo date('d M Y', strtotime($data->reg_date)) ?></td>
                                                    <td><?php echo $data->nama ?></td>
                                                    <td><?php echo number_format($data->total_saldo) ?></td>
                                                    <td><?php echo $data->paket ?> bulan</td>
                                                    <td><?php 
                                                        if ($data->status == 1) {
                                                            echo '<button type="button" class="btn btn-success btn-sm">Aktif</button>';
                                                        }else{
                                                            echo '<button type="button" class="btn btn-secondary btn-sm">Tidak Aktif</button>';
                                                        }
                                                     ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('staff/reminder/ver/'.$data->user_id) ?>" class="btn btn-primary" onclick="return confirm('Anda yakin verifikasi data ini ?')"><i class="ik ik-check"></i> Verifikasi</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>User ID</th>
                                            <th>Tgl Daftar</th>
                                            <th>Nama Lengkap</th>
                                            <th>Saldo</th>
                                            <th>Paket</th>
                                            <th>Status</th>
                                            <th>#</th>                    
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
        
                            </div>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                  <div class="dt-responsive">
                                    <table id="simpletable2"
                                           class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>User ID</th>
                                            <th>Tgl Daftar</th>
                                            <th>Nama Lengkap</th>
                                            <th>Saldo</th>
                                            <th>Paket</th>
                                            <th>Status</th>
                                            <th width="10%">#</th>                    
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($above as $data) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo substr($data->user_id, 0,18) ?></td>
                                                    <td><?php echo date('d M Y', strtotime($data->reg_date)) ?></td>
                                                    <td><?php echo $data->nama ?></td>
                                                    <td><?php echo number_format($data->total_saldo) ?></td>
                                                    <td><?php echo $data->paket ?> bulan</td>
                                                    <td><?php 
                                                        if ($data->status == 1) {
                                                            echo '<button type="button" class="btn btn-success btn-sm">Aktif</button>';
                                                        }else{
                                                            echo '<button type="button" class="btn btn-secondary btn-sm">Tidak Aktif</button>';
                                                        }
                                                     ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('cetak/client/'.$data->user_id) ?>" target="_blank" class="btn btn-primary"><i class="ik ik-printer"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>User ID</th>
                                            <th>Tgl Daftar</th>
                                            <th>Nama Lengkap</th>
                                            <th>Saldo</th>
                                            <th>Paket</th>
                                            <th>Status</th>
                                            <th>#</th>                    
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
