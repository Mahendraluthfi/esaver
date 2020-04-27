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
                        <a href="<?php echo base_url('staff/transaksi') ?>"><i class="ik ik-users"></i> Transaksi</a>
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
        <h3 class="d-inline-block"><?php echo $data? 'Transaksi - ' . $data->kode_transaksi : 'Tambah Transaksi' ?></h3>                   
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open_multipart('staff/transaksi/save', array('class' => 'sample-form')); ?>
                <legend>Data Diri</legend>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">User ID / Jemaah</label>
                    <div class="col-sm-9">
                        <?php if(!$data): ?>
                        <div class="input-group">
                            <input type="text" readonly data-modal="clientModalDisplay" class="form-control" placeholder="User ID / Jemaah" required="">
                            <input type="hidden" readonly data-modal="clientModal" class="form-control" placeholder="User ID / Jemaah" name="user_id" required="">
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
                        <input type="number" min="0" class="form-control" placeholder="Jumlah" name="amount" required="">
                        <?php else: ?>
                            <p><?php echo moneyFormat($data->amount) ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <?php if($data): ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <p><?php echo date('d-M-Y h:i:s',strtotime($data->date)) ?></p>
                    </div>
                </div>
                <?php endif ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tipe bayar</label>
                    <div class="col-sm-3">
                        <?php if(!$data): ?>
                        <select name="type" id="tipe_bayar" class="form-control select2">
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                        </select>
                        <?php else: ?>
                            <p><?php echo $data->tipe_bayar ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group bukti-bayar-wrapper row">
                    <label class="col-sm-3 col-form-label">Bukti</label>
                    <div class="col-sm-6">
                        <?php if(!$data): ?>
                        <input type="file" class="" name="bukti_bayar" id="inputBuktiBayar">
                        <?php endif ?>
                        <div class="mt-3">
                            <img src="<?php echo $data? site_url() . $data->foto_bukti:'' ?>" style="max-width:100%" id="imgPreview" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-3">
                        <?php if(!$data): ?>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <?php else: ?>
                            <a href="<?php echo site_url('staff/transaksi/print/' . $data->kode_transaksi) ?>" class="btn btn-primary" target="_blank">Cetak</a>
                        <?php endif ?> 
                        <a href="<?php echo site_url('staff/transaksi') ?>" class="btn btn-danger">Kembali</a> 
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function(){
        $('#tipe_bayar').change(function(e){
            $('.bukti-bayar-wrapper').toggle($(this).val() != 'Cash')
        });
        $("#inputBuktiBayar").change(function() {
            readURL(this);
        });

        <?php if($data): ?>
            <?php if($data->tipe_bayar == 'Cash'): ?>
                $('.bukti-bayar-wrapper').hide()
            <?php endif ?>
        <?php endif ?>
    })

</script>

<?php include('client_modal.php') ?>