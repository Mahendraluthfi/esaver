<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-home bg-blue"></i>
                <div class="d-inline">
                    <h5>Transaksi</h5>
                    <span>Tambah Transaksi Jamaah</span>
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
                    <li class="breadcrumb-item active">
                        Tambah Baru
                    </li>   
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-block">
        <h3>Tambah Transaksi</h3>                    
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <?php echo form_open_multipart('administrator/transaksi/save', array('class' => 'sample-form')); ?>
                <legend>Data Diri</legend>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">User</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" data-modal="clientModal" class="form-control" placeholder="User" name="user_id" required="">
                            <div class="input-group-append">
                                <button data-toggle="modal" data-target="#clientModal" class="btn btn-outline-secondary" type="button">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Jumlah" name="amount" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tipe bayar</label>
                    <div class="col-sm-3">
                        <select name="type" class="form-control select2">
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('administrator/transaksi') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#clientModalTable').on('click','td',function(){
        console.log(this);
        
    })

</script>

<?php include('client_modal.php') ?>