<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-home bg-blue"></i>
                <div class="d-inline">
                    <h5>Staff</h5>
                    <span>Data Akun Staff</span>
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
                        <i class="ik ik-user-check"></i> Staff
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
        <h3>Data Staff</h3>            
        </div>
        <div class="float-right">
            <button type="button" class="btn btn-info" onclick="add()"><i class="ik ik-plus"></i> Tambah</button>
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
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th width="10%">#</th>                    
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($get as $data) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->username ?></td>
                            <td><?php echo $data->level ?></td>
                            <td><?php 
                                if ($data->status == 1) {
                                    echo '<button type="button" class="btn btn-success btn-sm">Aktif</button>';
                                }else{
                                    echo '<button type="button" class="btn btn-secondary btn-sm">Tidak Aktif</button>';                                    
                                }
                             ?></td>
                            <td>
                                <?php 
                                if ($data->status == 1) { ?>
                                        <button type="button" class="btn btn-warning btn-sm" onclick="get('<?php echo $data->id ?>','inactive')"><i class="fa fa-ban"></i></button>
                                    <?php }else{ ?>
                                        <button type="button" class="btn btn-success btn-sm" onclick="get('<?php echo $data->id ?>','active')"><i class="fa fa-check"></i></button>                                        
                                    <?php } ?>
                                <!-- <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button> -->
                                <button type="button" class="btn btn-danger btn-sm" onclick="get('<?php echo $data->id ?>','hapus')"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>#</th>                    
                </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Tambah Data Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">            
                <?php echo form_open('administrator/staff/add', array('class' => 'forms-sample')); ?>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="exampleInputUsername2" placeholder="Username" required="">
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="psw" class="form-control" id="exampleInputPassword2" placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="psw2" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password" required="">
                        </div>
                    </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>            
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
                <h4 class="text-center">Hapus Akun Staff ?</h4>
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
    function add() {
        $('#exampleModalCenter').modal('show');
    }

    function get(id,set) {
        
        $.ajax({
            url : "<?php echo base_url('administrator/staff/get/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                // console.log(data);
                if (set == 'inactive') {
                    $('.btn-inv').attr('href','<?php echo base_url('administrator/staff/inactive/') ?>'+id);
                    $('#inactive-modal').modal('show');
                }else if(set == 'active'){
                    $('.btn-act').attr('href','<?php echo base_url('administrator/staff/active/') ?>'+id);
                    $('#active-modal').modal('show');
                }else{
                    $('.btn-hps').attr('href','<?php echo base_url('administrator/staff/delete/') ?>'+id);
                    $('#delete-modal').modal('show');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

</script>