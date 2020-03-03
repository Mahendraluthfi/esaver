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
            <a href="<?php echo base_url('administrator/transaksi/add') ?>" class="btn btn-info"><i class="ik ik-plus"></i>Tambah</a>
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
                    <td><?php echo $item->amount ?></td>
                    <td><?php echo $item->tipe_bayar ?></td>
                    <td><a href="<?php echo site_url() . 'administrator/transaksi/show/ '. $item->kode_transaksi ?>" class="btn"></a></td>
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


<div class="modal fade" id="inactive-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <!--  <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Tambah Data Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div> -->
            <div class="modal-body">
                <h4 class="text-center">Nonaktifkan akun staff ?</h4>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-primary btn-inv">Simpan</a>
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

<div class="modal fade" id="active-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <!--  <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Tambah Data Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div> -->
            <div class="modal-body">
                <h4 class="text-center">Aktifkan akun staff ?</h4>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-primary btn-act">Simpan</a>
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <!--  <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Tambah Data Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div> -->
            <div class="modal-body">
                <h4 class="text-center">Hapus Data Transaksi ?</h4>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger btn-hps">Hapus</a>
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

<script>
  function hapus(id) {
        
        $.ajax({
            url : "<?php echo base_url('administrator/client/get/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                // console.log(data);               
                    $('.btn-hps').attr('href','<?php echo base_url('administrator/client/delete/') ?>'+id);
                    $('#delete-modal').modal('show');                

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

</script>