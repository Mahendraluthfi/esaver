<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Out Transaksi</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<style>
    @page { 
        /*margin: 0px; */
    }
    body { 
        margin: 0px; 
        /*margin-left: 30px;*/
        margin-top: -30px;
        margin-right: : 50px;
        /*font-size: 11px;*/
        font-size: 12px;
        font-family: Ubuntu;
    }

    /*@media print {*/
        .page-break {
            page-break-before: always;
        }
        /*.table-bordered>tr>th{
        	padding: 5px;
        }*/
        /*.font-content{
        }*/
    /*}*/    
</style>
<body>
	<u>PT. Tsuraiya Tour Travel</u> <br>
	<div class="pull-right">
		<?php echo date('d M Y'); ?>		
	</div>
	<span style="font-size: 14px;">Print Out Transaksi Tabungan Jamaah</span><hr>
	<table class="table table-bordered">		
		<tr>
			<td class="active" width="20%">User ID</td>
			<td width="1%">:</td>
			<td><?php echo $client->user_id ?></td>
		</tr>		
		<tr>
			<td class="active">Nama</td>
			<td>:</td>
			<td><?php echo $client->nama ?></td>
		</tr>	
		<tr>
			<td class="active">Alamat</td>
			<td>:</td>
			<td><?php echo $client->alamat ?></td>
		</tr>		
		<tr>
			<td class="active">Nomor HP</td>
			<td>:</td>
			<td><?php echo $client->telp ?></td>
		</tr>	
		<tr>
			<td class="active">Saldo</td>
			<td>:</td>
			<td><?php echo "Rp. ".number_format($saldo->total_saldo) ?></td>
		</tr>					
	</table><hr>
	<table width="100%" border="1" style="border-collapse: collapse; text-align: center;">		
		<tr style="background-color: #dedede; ">
			<td>No</td>
			<td>Kode_transaksi</td>
			<td>Tanggal</td>
			<td>Nominal</td>
			<td>Tipe Bayar</td>
            <th>Input by</th>			
		</tr>
		<?php $no=1; foreach ($transaksi as $data) { ?>
			<tr>
				<td><?php echo $no++ ?></td>	
				<td><?php echo $data->kode_transaksi ?></td>	
				<td><?php echo $data->date ?></td>	
				<td><?php echo number_format($data->amount) ?></td>	
				<td><?php echo $data->tipe_bayar ?></td>	
				<td><?php echo $data->input_by ?></td>	
			</tr>
		<?php } ?>		
	</table>
	
</body>
</html>