<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-home bg-blue"></i>
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
                    <th>Nama Lengkap</th>
                    <th>Usia</th>
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
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->usia ?> thn</td>
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
                                <button type="button" class="btn btn-primary"><i class="ik ik-dollar-sign"></i></button>
                                <button type="button" class="btn btn-info"><i class="ik ik-eye"></i></button>
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
                    <th>Nama Lengkap</th>
                    <th>Usia</th>
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