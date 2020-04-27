<div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-upload-cloud bg-blue"></i>
                    <div class="d-inline">
                        <h5>Export Import</h5>
                        <span>Export Import Data Jamaah</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>"><i class="ik ik-home"></i> Dashboard</a>
                        </li>                        
                    </ol>
                </nav>
            </div>
        </div>
</div>

<div class="row clearfix">
    <div class="col-sm-2 col-md-2 col-lg-2"></div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <a href="<?php echo base_url('administrator/export/exportexcel') ?>" class="btn btn-primary" style="width: 100%; font-size: 20px; height: auto;"><i class="ik ik-download"></i> Export Data</a>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <button type="button" onclick="show()" class="btn btn-success" style="width: 100%; font-size: 20px; height: auto;"><i class="ik ik-upload"></i> Import Data</button>
        
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2"></div>
</div><p></p>
    <?php if(form_error('fileURL')) {?>    

    <div class="row clearfix">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="alert bg-danger alert-danger text-white" role="alert">
            <?php print form_error('fileURL'); ?>                
            </div>            
        </div>
        <div class="col-2"></div>                
    </div>
    <?php } ?>
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-block">
                    <div class="alert alert-success">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                        <strong>Berhasil Import Data !</strong>
                    </div>
                    <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th width="1%">No</th>
                                  <th>User ID</th>
                                  <th>Nama</th>
                                  <th>Tempat/Tgl Lahir</th>
                                  <th>No HP</th>
                                  <th>Paket</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($dataInfo as $key => $data) { ?>
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['user_id'] ?></td>
                                  <td><?php echo $data['nama'] ?></td>
                                  <td><?php echo $data['tempat'].' / '.date('d M Y', strtotime($data['tgl_lahir'])) ?></td>
                                  <td><?php echo $data['telp'] ?></td>
                                  <td><?php echo $data['paket'] ?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                      </table>      
                  </div>
              </div>
        </div>
    </div>
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Import Data Jamaah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6 class="text-center"><i>Dibawah ini tersedia format file untuk upload data jamaah. Anda diharuskan menggunakan format tabel yang sudah disediakan.</i></h6>
                <div class="row clearfix text-center">
                    <div class="col-sm-3 col-md-3 col-lg-3"></div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php print site_url();?>assets/sample/sample-xlsx.xlsx" class="btn btn-primary"><i class="fa fa-file-excel"></i>Download Sample .XLSX</a>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php print site_url();?>assets/sample/sample-xls.xls" class="btn btn-primary"><i class="fa fa-file-excel"></i>Download Sample .XLS</a>                        
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3"></div>
                </div>
                <hr>
                <div class="text-center">                    
                    <?php echo form_open_multipart('administrator/export/upload', array('class' => 'forms-sample')); ?>
                       <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="fileURL" class="file-upload-default" required="">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload .xls / .xlsx / .csv">
                                <span class="input-group-append">
                                <button class="file-upload-browse btn btn-warning" type="button">Pilih File</button>
                                </span>
                            </div>
                        </div>   
                        <button type="submit" class="btn btn-success"><i class="ik ik-upload"></i> Upload</button>                                                               
                    </form>
                </div>
            </div>                            
        </div>
    </div>
</div>

<script>
    function show() {
        // body...
        $('#detail-modal').modal('show');
    }
</script>