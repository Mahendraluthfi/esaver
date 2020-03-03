<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-home bg-blue"></i>
                <div class="d-inline">
                    <h5>Transaksi</h5>
                    <span><?php echo $data? $data->kode_transaksi : 'Tambah Transaksi Jamaah' ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url() ?>"><i class="ik ik-home"></i> Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url('administrator/transaksi') ?>"><i class="ik ik-users"></i> Transaksi</a>
                    </li>                     
                    <li class="breadcrumb-item active" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 100px;" >
                        <?php echo $data? $data->kode_transaksi : 'Tambah Baru' ?>
                    </li>   
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex">
        <h3 class="d-inline-block">Tambah Transaksi</h3>
        <a href="<?php echo site_url('administrator/transaksi') ?>" class="btn btn-primary ml-auto">Kembali</a>                    
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open_multipart('administrator/transaksi/save', array('class' => 'sample-form')); ?>
                <legend>Data Diri</legend>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">User</label>
                    <div class="col-sm-9">
                        <?php if(!$data): ?>
                        <div class="input-group">
                            <input type="text" data-modal="clientModal" class="form-control" placeholder="User" name="user_id" required="">
                            <div class="input-group-append">
                                <button data-toggle="modal" data-target="#clientModal" class="btn btn-outline-secondary" type="button">Pilih</button>
                            </div>
                        </div>
                        <?php else: ?>
                            <p><?php echo $data->nama ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <?php if(!$data): ?>
                        <input type="text" class="form-control" placeholder="Jumlah" name="amount" required="">
                        <?php else: ?>
                            <p><?php echo $data->amount ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tipe bayar</label>
                    <div class="col-sm-3">
                        <?php if(!$data): ?>
                        <select name="type" class="form-control select2">
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                        </select>
                        <?php else: ?>
                            <p><?php echo $data->tipe_bayar ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bukti</label>
                    <div class="col-sm-6">
                        <?php if(!$data): ?>
                        <input type="file" class="" required name="bukti_bayar" id="inputBuktiBayar">
                        <?php endif ?>
                        <div class="mt-3">
                            <img src="<?php echo $data? site_url() . $data->foto_bukti:'' ?>" style="max-width:100%" id="imgPreview" alt="">
                        </div>
                    </div>
                </div>
                <?php if(!$data): ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('administrator/transaksi') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>


<script>
    $('#clientModalTable').on('click','td',function(){
        console.log(this);
        
    })
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputBuktiBayar").change(function() {
        readURL(this);
    });
</script>

<?php include('client_modal.php') ?>