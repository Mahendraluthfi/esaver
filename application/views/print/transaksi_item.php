<h3>Transaksi <?php echo $data->kode_transaksi ?></h3>
<div class="row mb-10">
    <div class="col-50">Penyetor</div>
    <div class="col-50"><?php echo $data->nama ?></div>
</div>
<div class="row mb-10">
    <div class="col-50">Waktu Transaksi</div>
    <div class="col-50"><?php echo $data->date ?></div>
</div>
<div class="row mb-10">
    <div class="col-50">Jumlah</div>
    <div class="col-50"><?php echo moneyFormat($data->amount) ?></div>
</div>