<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-users bg-blue"></i>
                <div class="d-inline">
                    <h5>Jamaah</h5>
                    <span>Data Jamaah Umroh</span>
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
                        <i class="ik ik-users"></i> Jamaah
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
        <h3>Data Jamaah</h3>            
        </div>
        <div class="float-right">
            <a href="<?php echo base_url('administrator/client/add') ?>" class="btn btn-info"><i class="ik ik-plus"></i>Tambah</a>
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
                    <th>User ID</th>
                    <th>Tgl Daftar</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th width="10%">#</th>                    
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($get as $data) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo substr($data->user_id, 0,18) ?></td>
                            <td><?php echo date('d M Y', strtotime($data->reg_date)) ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->alamat ?></td>
                            <td><?php echo $data->paket ?> bulan</td>
                            <td><?php 
                                if ($data->status == 1) {
                                    echo '<button type="button" class="btn btn-success btn-sm">Aktif</button>';
                                }else{
                                    echo '<button type="button" class="btn btn-secondary btn-sm">Tidak Aktif</button>';
                                }
                             ?></td>
                            <td>
                                <a href="<?php echo site_url('administrator/client/saldo/'.$data->user_id) ?>" class="btn btn-primary"><i class="ik ik-dollar-sign"></i></a>
                                <button type="button" class="btn btn-info" onclick="detail('<?php echo $data->user_id ?>')"><i class="ik ik-eye"></i></button>
                                <a href="<?php echo base_url('administrator/client/edit/'.$data->user_id) ?>" class="btn btn-warning" title="Edit Data"><i class="ik ik-edit"></i></a>
                                <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $data->user_id ?>')"><i class="ik ik-trash"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>User ID</th>
                    <th>Tgl Daftar</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th>#</th>                    
                </tr>
                </tfoot>
            </table>
        </div>
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
                <h4 class="text-center">Hapus Data Jamaah ?</h4>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger btn-hps">Hapus</a>
            </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>
<style>
    .dt{
        font-weight: bold;
    }
</style>
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Detail Data Jamaah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover table-striped">                    
                        <tr>
                            <td width="35%" class="dt">User ID</td>
                            <td><span class="userid"></span></td>
                        </tr>                    
                        <tr>
                            <td width="35%" class="dt">Nama Lengkap</td>
                            <td><span class="nama"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">NIK</td>
                            <td><span class="nik"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">No Paspor</td>
                            <td><span class="no_paspor"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Tempat/Tgl Lahir</td>
                            <td><span class="tempat"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Jenis Kelamin</td>
                            <td><span class="jekel"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Email</td>
                            <td><span class="email"></span></td>
                        </tr>           
                        <tr>
                            <td width="35%" class="dt">Usia</td>
                            <td><span class="usia"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Ibu Kandung</td>
                            <td><span class="nm_ibu"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Status Pernikahan</td>
                            <td><span class="status_nikah"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Alamat Lengkap</td>
                            <td><span class="alamat"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Provinsi</td>
                            <td><span class="nama_prov"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Kab/Kota</td>
                            <td><span class="nama_kabkot"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Kecamatan</td>
                            <td><span class="nama_kec"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Kode Pos</td>
                            <td><span class="kodepos"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">No Telepon</td>
                            <td><span class="telp"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Pekerjaan</td>
                            <td><span class="pekerjaan"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Foto</td>
                            <td><img src="" class="img" alt="" height="200" width="150"></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Paket Umroh</td>
                            <td><span class="paket"></span></td>
                        </tr>
                        <tr>
                            <td width="35%" class="dt">Password</td>
                            <td><span class="text-danger dt password"></span></td>
                        </tr>
                </table>
            </div>                            
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

    function detail(id) {
         $.ajax({
            url : "<?php echo base_url('administrator/client/get_id/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {              
                $('.userid').text(data.user_id);                                      
                $('.nama').text(data.nama);                                      
                $('.no_paspor').text(data.no_paspor);                                      
                $('.email').text(data.email);                                      
                $('.tempat').text(data.tempat+' / '+data.tgl_lahir);                                      
                $('.nik').text(data.nik);                                      
                $('.jekel').text(data.jekel);                                      
                $('.usia').text(data.usia+' th');                                      
                $('.status_nikah').text(data.status_nikah);                                      
                $('.nm_ibu').text(data.nm_ibu);                                      
                $('.alamat').text(data.alamat);                                      
                $('.nama_prov').text(data.nama_prov);                                      
                $('.nama_kabkot').text(data.nama_kabkot);                                      
                $('.nama_kec').text(data.nama_kec);                                      
                $('.telp').text(data.telp);                                      
                $('.kodepos').text(data.kodepos);                                      
                $('.pekerjaan').text(data.pekerjaan);                                      
                $('.paket').text(data.paket+' Bulan'); 
                if (data.foto == "") {
                    $('.img').attr('src','<?php echo base_url('assets/img/dum.png') ?>');
                }else{
                    $('.img').attr('src','<?php echo base_url('assets/fotoclient/') ?>'+data.foto);
                }                                     
                $('.password').text(data.password);                                      


                
                $('#detail-modal').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

</script>