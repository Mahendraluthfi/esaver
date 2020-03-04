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
<div class="card">
    <div class="card-header d-block">
        <div class="float-left">
        <h3>Data Transaksi</h3>            
        </div>
        <div class="float-right">
            <a href="<?php echo base_url('staff/transaksi/add') ?>" class="btn btn-info"><i class="ik ik-plus"></i>Tambah</a>
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
                    <th>Nama Jemaah</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th width="10%">#</th>                    
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $key => $item): ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $item->kode_transaksi ?></td>
                    <td><?php echo $item->nama ?></td>
                    <td><?php echo $item->date ?></td>
                    <td><?php echo moneyFormat($item->amount) ?></td>
                    <td><?php echo $item->tipe_bayar ?></td>
                    <td>
                        <a href="<?php echo site_url() . 'staff/transaksi/show/'. $item->kode_transaksi ?>" class="btn  btn-info"><i class="ik ik-eye"></i></a>
                        <a data-toggle="modal" data-target="#modalDeleteTransaksi" href="<?php echo site_url() . 'staff/transaksi/delete/'. $item->kode_transaksi ?>" class="btn  btn-danger"><i class="ik ik-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th width="1%">No</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Jemaah</th>
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

<div class="modal fade" id="modalDeleteTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">Hapus Data Transaksi ?</h4>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="modalDeleteTransaksiAction" class="btn btn-danger btn-hps">Hapus</a>
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>
<script>
    $('#modalDeleteTransaksi').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        $('#modalDeleteTransaksiAction').attr('href', button.attr('href'));
    })
</script>
