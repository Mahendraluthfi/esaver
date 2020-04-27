<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-file-text bg-blue"></i>
                <div class="d-inline">
                    <h5>Laporan Transaksi</h5>
                    <span>Laporan Transaksi Jamaah</span>
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
                        <i class="ik ik-user-check"></i> Laporan Transaksi
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
    <div class="card-header d-block" style="padding: 15px;">        
        <div class="float-left">
            <h3>Cari Laporan</h3>            
        </div>
        <div class="float-right">
            <!-- <div class="input-daterange input-group" id="datepicker">
                <span class="input-group-addon">to</span>
            </div> -->
            <form class="form-inline input-daterange">
                <!-- <div class="" id="datepicker">                                     -->
                    <input type="text" class="form-control mb-2 mr-sm-2" name="start" placeholder="Tanggal Awal" required="" />
                    <!-- <input type="date" class="form-control " name="date"> -->
                    <label class="form-control-label mb-1 mr-sm-1"><></label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="end" placeholder="Tanggal Akhir" />
                    <!-- <input type="date" class="form-control mb-2 mr-sm-2" name="date"> -->
                    <button type="button" onclick="search()" class="btn btn-primary mb-2"><i class="ik ik-search"></i>Cari</button>
                <!-- </div>                 -->
            <?php echo form_close(); ?>
        </div>    
    </div>
    <div class="card-body" id="show" style="display: none;">
        <div class="float-left">
            <h6 class="title"></h6>            
        </div>
        <div class="float-right">
            <a href="" target="_blank" class="btn btn-warning link-print"><i class="ik ik-printer"></i> Cetak</a>            
        </div><p>&nbsp;</p><hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>UserID</th>
                    <th>Nama</th>
                    <th>Datetime</th>
                    <th>Jumlah</th>
                    <th>Tipe Bayar</th>
                </tr>
            </thead>
            <tbody id="tb_show">
                
            </tbody>
        </table>
    </div>
    <div class="card-body" id="fail" style="display: none;">
        <div class="alert alert-danger">            
            <strong>Data tidak ditemukan !</strong>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script>
    $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    function search() {
        var hari = $('[name="start"]').val();
        var end = $('[name="end"]').val();
        if (hari == "") {
            alert('Anda wajib memilih tanggal !');
        }else{
            // alert(hari);
             $.ajax({
                url : "<?php echo base_url('staff/laporan/submit/')?>" +hari+"/"+end,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    // console.log(data);
                    
                        var html1 = '';
                        var i;  
                        var no = 1;
                        for(i=0; i<data.length; i++){
                            html1 += "<tr>"+                        
                                "<td>"+no+++"</td>"+
                                "<td>"+data[i].user_id+"</td>"+
                                "<td>"+data[i].nama+"</td>"+
                                "<td>"+data[i].date+"</td>"+
                                "<td>"+data[i].amount+"</td>"+                                
                                "<td>"+data[i].tipe_bayar+"</td>"+                                
                                "</tr>";
                            }
                        $('#tb_show').html(html1);     
                        $('.title').text('Hasil Laporan '+hari+' - '+end);
                        $('.link-print').attr('href','<?php echo base_url('cetak/laporan/') ?>'+hari+'/'+end);
                        $('#show').css('display','block');                    
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
    }

</script>