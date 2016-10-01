<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <form id="form" action="<?php echo base_url('daftar_akun/doSaveMahasiswa'); ?>" class="form-horizontal" method="post">
            <section class="panel panel-success" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                    </div>

                    <h2 class="panel-title">Form Pendaftaran Akun</h2>
                </header>
                <div class="panel-body">
                    <?php 
                        echo @$this->session->flashdata('flash_data'); 
                        if(@$this->session->flashdata('post_item')){
                            $mhs = (object)@$this->session->flashdata('post_item');
                        }
                    ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">NIM <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nim_mahasiswa" class="form-control" value="<?php echo @$mhs->nim_mahasiswa; ?>" placeholder="NIM" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Username <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" value="<?php echo @$mhs->username; ?>" placeholder="Username" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="passwd" class="form-control" value="<?php if (@$mhs->password) {echo decode($mhs->password);} ?>" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jurusan <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="jurusan" class="form-control" value="<?php echo @$mhs->jurusan; ?>" placeholder="Jurusan" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_mahasiswa" value="<?php echo @$mhs->nama_mahasiswa; ?>" class="form-control" placeholder="Nama" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gender <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <div class="radio-custom radio-primary">
                                <input id="Laki-laki" name="jenis_kelamin_mahasiswa" <?php if (@$mhs->jenis_kelamin_mahasiswa == 'Laki-laki') {echo'checked';} ?> type="radio" value="Laki-laki" required />
                                <label for="Laki-laki">Laki - Laki</label>
                            </div>
                            <div class="radio-custom radio-primary">
                                <input id="Perempuan" name="jenis_kelamin_mahasiswa" <?php if (@$mhs->jenis_kelamin_mahasiswa == 'Perempuan') {echo'checked';} ?> type="radio" value="Perempuan" />
                                <label for="Perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="email_mahasiswa" value="<?php echo @$mhs->email_mahasiswa; ?>" class="form-control" placeholder="Email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tempat & Tanggal Lahir</label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <input type="text" name="tempat_lahir_mahasiswa" class="form-control" value="<?php echo @$mhs->tempat_lahir_mahasiswa; ?>" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" name="tanggal_lahir_mahasiswa" value="<?php echo @$mhs->tanggal_lahir_mahasiswa; ?>" data-date-format="yyyy-mm-dd" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textareaDefault">Alamat</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="alamat_mahasiswa" rows="3" id="textareaDefault"><?php echo @$mhs->alamat_mahasiswa; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telephone </label>
                        <div class="col-sm-9">
                            <input type="text" name="handphone_mahasiswa" class="form-control" value="<?php echo @$mhs->handphone_mahasiswa; ?>" placeholder="Telephone" />
                        </div>
                    </div> 
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>    
    </div>
</div>
<script>
    $('.datepicker').datepicker()
</script>