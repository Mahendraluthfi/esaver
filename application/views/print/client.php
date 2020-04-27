<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Out Client</title>
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
        .dt{
            background-color: #ccc;
        }  
</style>
<body>
	<u>PT. Tsuraiya Tour Travel</u> <br>
	<div class="pull-right">
		<?php echo date('d M Y'); ?>		
	</div>
	<span style="font-size: 14px;">Data Jamaah Terverifikasi</span><hr>	
	<div class="row">
        <div class="col-xs-11">
               <table class="table table-bordered table-hover table-striped">                    
                    <tr>
                        <td width="35%" class="dt">User ID</td>
                        <td><?php echo $get->user_id ?></td>
                    </tr>                    
                    <tr>
                        <td width="35%" class="dt">Nama Lengkap</td>
                        <td><?php echo $get->nama ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">NIK</td>
                        <td><?php echo $get->nik ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">No Paspor</td>
                        <td><?php echo $get->no_paspor ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Tempat/Tgl Lahir</td>
                        <td><?php echo $get->tempat ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Jenis Kelamin</td>
                        <td><?php echo $get->jekel ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Email</td>
                        <td><?php echo $get->email ?></td>
                    </tr>           
                    <tr>
                        <td width="35%" class="dt">Usia</td>
                        <td><?php echo $get->usia ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Ibu Kandung</td>
                        <td><?php echo $get->nm_ibu ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Status Pernikahan</td>
                        <td><?php echo $get->status_nikah ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Alamat Lengkap</td>
                        <td><?php echo $get->alamat ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Provinsi</td>
                        <td><?php echo $get->nama_prov ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Kab/Kota</td>
                        <td><?php echo $get->nama_kabkot ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Kecamatan</td>
                        <td><?php echo $get->nama_kec ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Kode Pos</td>
                        <td><?php echo $get->kodepos ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">No Telepon</td>
                        <td><?php echo $get->telp ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Pekerjaan</td>
                        <td><?php echo $get->pekerjaan ?></td>
                    </tr>                    
                    <tr>
                        <td width="35%" class="dt">Paket Umroh</td>
                        <td><?php echo $get->paket ?></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Total Saldo</td>
                        <td>Rp. <?php echo number_format($get->total_saldo) ?></td>
                    </tr>
                    
            </table>
       </div>   
    </div>
	
</body>
</html>