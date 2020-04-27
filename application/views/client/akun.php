<div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-home bg-blue"></i>
                    <div class="d-inline">
                        <h5>Akun Jamaah</h5>
                        <span>Informasi Data Jamaah</span>
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
                            <i class="ik ik-home"></i> Akun
                        </li>                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
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
                        <td><?php echo $get->tempat.'/'.$get->tgl_lahir ?></td>
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
                        <td width="35%" class="dt">Foto</td>
                        <td><img src="<?php echo base_url('assets/fotoclient/'.$get->foto) ?>" class="img" alt="" height="200" width="150"></td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Paket Umroh</td>
                        <td><?php echo $get->paket ?> Bulan</td>
                    </tr>
                    <tr>
                        <td width="35%" class="dt">Password</td>
                        <td><?php echo $get->password ?></td>
                    </tr>
            </table>
        </div>
        <div class="col-4">
            <div class="card">
            <div class="card-header d-block">
                <div class="float-left">
                <h3>Ubah Password</h3> 
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <?php echo form_open('client/akun/submit'); ?>
                        <?php echo $this->session->flashdata('msg'); ?>           
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Lama</label>
                            <input type="password" name="p1" class="form-control" id="exampleInputPassword1" placeholder="Password Lama">
                        </div>                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Baru</label>
                            <input type="password" name="p2" class="form-control" id="exampleInputPassword1" placeholder="Password Baru">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Konfirmasi Password Baru</label>
                            <input type="password" name="p3" class="form-control" id="exampleInputConfirmPassword1" placeholder="Konfirmasi Password Baru">
                        </div>                        
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light">Batal</button>
                      <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        </div>
    </div>