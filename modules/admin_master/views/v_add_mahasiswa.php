<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <?php if(@$edit){ ?>
        <form id="form" action="<?php echo base_url('admin_master/doEditMahasiswa');?>" class="form-horizontal" method="post">
            <input type="hidden" name="id_mahasiswa" value="<?php echo @$mhs->id_mahasiswa;?>">
        <?php }else{ ?>
        <form id="form" action="<?php echo base_url('admin_master/doSaveMahasiswa');?>" class="form-horizontal" method="post">
        <?php } ?>
        <section class="panel panel-quartenary" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Form Mahasiswa</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">NIM <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="nim_mahasiswa" class="form-control" value="<?php echo @$mhs->nim_mahasiswa;?>" placeholder="NIM" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" value="<?php echo @$mhs->username;?>" placeholder="Username" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="passwd" class="form-control" value="<?php if(@$mhs->password){echo decode($mhs->password);}?>" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jurusan <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="jurusan" class="form-control" value="<?php echo @$mhs->jurusan;?>" placeholder="Jurusan" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_mahasiswa" value="<?php echo @$mhs->nama_mahasiswa;?>" class="form-control" placeholder="Nama" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="radio-custom radio-primary">
                            <input id="L" name="jenis_kelamin_mahasiswa" <?php if(@$mhs->jenis_kelamin_mahasiswa=='L'){echo'checked';}?> type="radio" value="L" required />
                            <label for="L">Laki - Laki</label>
                        </div>
                        <div class="radio-custom radio-primary">
                            <input id="P" name="jenis_kelamin_mahasiswa" <?php if(@$mhs->jenis_kelamin_mahasiswa=='P'){echo'checked';}?> type="radio" value="P" />
                            <label for="P">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="email_mahasiswa" value="<?php echo @$mhs->email_mahasiswa;?>" class="form-control" placeholder="Email" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Tempat & Tanggal Lahir</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <input type="text" name="tempat_lahir_mahasiswa" class="form-control" value="<?php echo @$mhs->tempat_lahir_mahasiswa;?>" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" name="tanggal_lahir_mahasiswa" value="<?php echo @$mhs->tanggal_lahir_mahasiswa;?>" data-plugin-datepicker data-date-format="yyyy-mm-dd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Program Studi </label>
                    <div class="col-sm-9">
                        <input type="text" name="program_studi_mahasiswa" class="form-control" value="<?php echo @$mhs->program_studi_mahasiswa;?>" placeholder="Program Studi"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textareaDefault">Alamat</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="alamat_mahasiswa" rows="3" id="textareaDefault"><?php echo @$mhs->alamat_mahasiswa;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telephone </label>
                    <div class="col-sm-9">
                        <input type="text" name="handphone_mahasiswa" class="form-control" value="<?php echo @$mhs->handphone_mahasiswa;?>" placeholder="Telephone" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="status_dosen">Status</label>
                    <div class="col-md-4">
                        <select class="form-control input-sm mb-md" name="status">
                            <option <?php if(@$mhs->status==1){echo'selected';}?> value="1">Active</option>
                            <option <?php if(@$mhs->status==2){echo'selected';}?> value="2">Non Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url('admin_master/master_mahasiswa');?>" class="btn btn-success">Cancel</a>
                    </div>
                </div>
            </footer>
        </section>
        </form>    
    </div>
</div>