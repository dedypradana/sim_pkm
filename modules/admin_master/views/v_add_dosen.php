<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <?php if(@$edit){ ?>
        <form id="form" action="<?php echo base_url('admin_master/doEditDosen');?>" class="form-horizontal" method="post">
            <input type="hidden" name="id_dosen" value="<?php echo @$dosen->id_dosen;?>">
        <?php }else{ ?>
        <form id="form" action="<?php echo base_url('admin_master/doSaveDosen');?>" class="form-horizontal" method="post">
        <?php } ?>
        <section class="panel panel-success" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Form Dosen</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">NIP </label>
                    <div class="col-sm-9">
                        <input type="text" name="nip_dosen" class="form-control" value="<?php echo @$dosen->nip_dosen;?>" placeholder="NIP"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" value="<?php echo @$dosen->username;?>" placeholder="Username" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="passwd" class="form-control" value="<?php if(@$dosen->password){echo decode($dosen->password);}?>" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_dosen" value="<?php echo @$dosen->nama_dosen;?>" class="form-control" placeholder="Nama" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="radio-custom radio-primary">
                            <input id="Laki-laki" name="jenis_kelamin_dosen" <?php if(@$dosen->jenis_kelamin_dosen=='Laki-laki'){echo'checked';}?> type="radio" value="Laki-laki" required />
                            <label for="Laki-laki">Laki - Laki</label>
                        </div>
                        <div class="radio-custom radio-primary">
                            <input id="Perempuan" name="jenis_kelamin_dosen" <?php if(@$dosen->jenis_kelamin_dosen=='Perempuan'){echo'checked';}?> type="radio" value="Perempuan" />
                            <label for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="email_dosen" value="<?php echo @$dosen->email_dosen;?>" class="form-control" placeholder="Email" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Tempat & Tanggal Lahir</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <input type="text" name="tempat_lahir_dosen" class="form-control" value="<?php echo @$dosen->tempat_lahir_dosen;?>" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" name="tanggal_lahir_dosen" value="<?php echo @$dosen->tanggal_lahir_dosen;?>" data-plugin-datepicker data-date-format="yyyy-mm-dd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Program Studi </label>
                    <div class="col-sm-9">
                        <input type="text" name="program_studi_dosen" class="form-control" value="<?php echo @$dosen->program_studi_dosen;?>" placeholder="Program Studi"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Pendidikan Akhir </label>
                    <div class="col-sm-9">
                        <input type="text" name="pendidikan_tertinggi_dosen" class="form-control" value="<?php echo @$dosen->pendidikan_tertinggi_dosen;?>" placeholder="Pendidikan Akhir"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textareaDefault">Alamat</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="alamat_dosen" rows="3" id="textareaDefault"><?php echo @$dosen->alamat_dosen;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telephone </label>
                    <div class="col-sm-9">
                        <input type="text" name="handphone_dosen" class="form-control" value="<?php echo @$dosen->handphone_dosen;?>" placeholder="Telephone" />
                    </div>
                </div>
                <?php if($sesi == 'administrator'){ ?>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="status_dosen">Status</label>
                    <div class="col-md-4">
                        <select class="form-control input-sm mb-md" name="status_dosen">
                            <option value="">- Pilih -</option>
                            <option <?php if(@$dosen->status_dosen=='aktif_mengajar'){echo'selected';}?> value="aktif_mengajar">Aktif Mengajar</option>
                            <option <?php if(@$dosen->status_dosen=='tidak_aktif_mengajar'){echo'selected';}?> value="tidak_aktif_mengajar">Tidak Aktif Mengajar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="status_ikatan_kerja_dosen">Status Ikatan Kerja</label>
                    <div class="col-md-4">
                        <select class="form-control input-sm mb-md" name="status_ikatan_kerja_dosen">
                            <option value="">- Pilih -</option>
                            <option <?php if(@$dosen->status_ikatan_kerja_dosen=='tetap'){echo'selected';}?> value="tetap">Tetap</option>
                            <option <?php if(@$dosen->status_ikatan_kerja_dosen=='tidak_tetap'){echo'selected';}?> value="tidak_tetap">Tidak Tetap</option>
                            <option <?php if(@$dosen->status_ikatan_kerja_dosen=='honorer'){echo'selected';}?> value="honorer">Honorer</option>
                        </select>
                    </div>
                </div>
                <?php } ?>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary">Submit</button>
                        <?php if($sesi == 'administrator'){ ?>
                        <a href="<?php echo base_url('admin_master/master_dosen');?>" class="btn btn-success">Cancel</a>
                        <?php } else { ?>
                        <button type="button" onclick="history.go(-1);" class="btn btn-success">Cancel</button>
                        <?php } ?>
                    </div>
                </div>
            </footer>
        </section>
        </form>    
    </div>
</div>