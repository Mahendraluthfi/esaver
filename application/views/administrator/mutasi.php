<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-users bg-blue"></i>
                <div class="d-inline">
                    <h5>Cek Mutasi</h5>
                    <span>Cek Mutasi Transaksi Pembayaran</span>
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
                        <i class="ik ik-bell"></i> Cek Mutasi
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
    <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="card">
            <div class="card-header d-block">
                <h5>Detail Akun Bank</h5>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <span class="text-primary">No Rekening</span><br>
                    <h6><?php echo $account_number ?></h6>
                    <span class="text-primary">Nama Bank</span><br>
                    <h6><?php echo $label ?></h6>
                    <span class="text-primary">Atas Nama</span><br>
                    <h6><?php echo $atas_nama ?></h6>
                    <span class="text-primary">Saldo</span><br>
                    <h6>IDR <?php echo number_format($balance) ?></h6>
                </div>
            </div>
        </div>        
    </div>   
</div>
<div class="row clearfix">
     <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header d-block">
               <h6>Data Mutasi</h6>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="dt-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Tanggal</th>
                                <th>Mutasi ID</th>
                                <th>Type</th>
                                <th>Nominal</th>
                                <th>Balance</th>
                                <th>Deskripsi</th>                              
                                <th>Catatan</th>                              
                            </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($mutation as $data) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data->created_at ?></td>
                                        <td><?php echo $data->mutation_id ?></td>
                                        <td><?php echo $data->type ?></td>
                                        <td><?php echo number_format($data->amount) ?></td>
                                        <td><?php echo number_format($data->balance) ?></td>
                                        <td><?php echo $data->description ?></td>
                                        <td><?php echo $data->note ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
