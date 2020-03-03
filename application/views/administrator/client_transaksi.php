<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-home bg-blue"></i>
                <div class="d-inline">
                    <h5>Transaksi</h5>
                    <span>Data Transaksi Umroh</span>
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
                        <i class="ik ik-users"></i> Transaksi
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
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3><?php echo $data['client']->nama ?></h3>     
            </div>
            <div class="card-body">  
                <label for="">Saldo</label>
                <p> <?php echo moneyFormat($data['saldo']?$data['saldo']->total_saldo:0) ?> </p>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block">
        <div class="float-left">
        <h3>Data Transaksi</h3>            
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="dt-responsive">
            <table id="simpletable"
                   class="table table-striped table-bordered nowrap">
                <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th width="10%">#</th>                    
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['transaksi'] as $key => $item): ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $item->kode_transaksi ?></td>
                    <td><?php echo $item->date ?></td>
                    <td><?php echo moneyFormat($item->amount) ?></td>
                    <td><?php echo $item->tipe_bayar ?></td>
                    <td><a href="<?php echo site_url() . 'administrator/transaksi/show/'. $item->kode_transaksi ?>" class="btn  btn-info"><i class="ik ik-eye"></i></a></td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th width="1%">No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th width="10%">#</th>                    
                </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
</div>

