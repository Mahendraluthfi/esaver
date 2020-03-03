<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-home bg-blue"></i>
                <div class="d-inline">
                    <h5>Jamaah</h5>
                    <span>Tambah Jamaah Umroh</span>
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
                        <a href="<?php echo base_url('administrator/client') ?>"><i class="ik ik-users"></i> Jamaah</a>
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
        <h3>Formulir Pendaftaran Jamaah</h3>                    
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <?php echo form_open_multipart('administrator/client/save', array('class' => 'sample-form')); ?>
                <legend>Data Diri</legend>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nomor Induk Kependudukan" name="nik" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No Paspor</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nomor Paspor" name="no_paspor" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tempat/Tgl Lahir</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat">
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_lahir">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Usia</label>
                    <div class="col-sm-3">
                        <input type="number" min="0" class="form-control" placeholder="Usia" name="usia">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ibu Kandung</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Nama Ibu Kandung" name="ibu">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="Alamat E-mail" name="email" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <select name="jekel" class="form-control select2">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status Pernikahan</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control select2">
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Janda/Duda">Janda/Duda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat"></textarea>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="email1" class="col-sm-3 control-label col-form-label">Provinsi</label>
                    <div class="col-sm-9">
                         <select name="provinsi" id="prov" class="select2 form-control custom-select" style="width: 100%;" required="required">
                            <option value="" selected="Provinsi">Provinsi</option>
                            <?php foreach ($prov as $dprov) { ?>                          

                            <option value="<?php echo $dprov->id_prov ?>"><?php echo $dprov->nama_prov ?></option>

                            <?php } ?>
                         </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 control-label col-form-label">Kab/Kota</label>
                    <div class="col-sm-9">
                        <select name="kabkot" id="kabkot" class="kabkot select2 form-control custom-select" style="width: 100%;" required="required">
                            <option value="" selected="Kota / Kab">Kota / Kab</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 control-label col-form-label">Kecamatan</label>
                    <div class="col-sm-9">
                        <select name="kecamatan" id="kec" class="kec select2 form-control custom-select" style="width: 100%;" required="required">
                            <option value="" selected="Kecamatan">Kecamatan</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kode Pos</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No Telepon / HP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="telp" placeholder="No Telepon / HP">                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                </div>   
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-6">
                      <input type="file" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>                        
                    </div>
                </div>

                <legend>Data Keberangkatan</legend>
                <!-- <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Rencana Keberangkatan</label>
                    <div class="col-sm-3">
                        <input type="month" class="form-control" name="" placeholder="Pekerjaan">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Paket Tabungan Umroh</label>
                    <div class="col-sm-3">
                        <select name="paket" class="form-control select2">
                            <option value="12">12 Bulan</option>
                            <option value="24">24 Bulan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('administrator/client') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    
  $(document).ready(function(){
    $('#prov').change(function(){
    var id=$(this).val();
        $.ajax({
        url : "<?php echo site_url();?>administrator/client/get_kabkot",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        html += '<option value="0">-- Pilih --</option>';                    
        for(i=0; i<data.length; i++){
            html += '<option value="'+data[i].id_kabkot+'">'+data[i].nama_kabkot+'</option>';
        }
        $('#kabkot').html(html);                      
        // $('#kabkot').trigger('change');                        
        }
    });
    });
});

$(document).ready(function(){
        $('.kabkot').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo site_url();?>administrator/client/get_kec",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_kec+'">'+data[i].nama_kec+'</option>';
                    }
                    $('.kec').html(html);
                    
                }
            });
        });
});

</script>