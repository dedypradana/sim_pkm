<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <?php if(@$edit){ ?>
        <form id="form" action="<?php echo base_url('admin_master/doEditAdmin');?>" class="form-horizontal" method="post">
            <input type="hidden" name="id_admin" value="<?php echo @$admin->id_admin;?>">
        <?php }else{ ?>
        <form id="form" action="<?php echo base_url('admin_master/doSaveAdmin');?>" class="form-horizontal" method="post">
        <?php } ?>
        <section class="panel panel-tertiary" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Form Administrator</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">NIP </label>
                    <div class="col-sm-9">
                        <input type="text" name="nip_admin" class="form-control" value="<?php echo @$admin->nip_admin;?>" placeholder="NIP"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" value="<?php echo @$admin->username;?>" placeholder="Username" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="passwd" class="form-control" value="<?php if(@$admin->password){echo decode($admin->password);}?>" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_admin" value="<?php echo @$admin->nama_admin;?>" class="form-control" placeholder="Nama" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="radio-custom radio-primary">
                            <input id="Laki-laki" name="jenis_kelamin_admin" <?php if(@$admin->jenis_kelamin_admin=='Laki-laki'){echo'checked';}?> type="radio" value="Laki-laki" required />
                            <label for="Laki-laki">Laki - Laki</label>
                        </div>
                        <div class="radio-custom radio-primary">
                            <input id="Perempuan" name="jenis_kelamin_admin" <?php if(@$admin->jenis_kelamin_admin=='Perempuan'){echo'checked';}?> type="radio" value="Perempuan" />
                            <label for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="email_admin" value="<?php echo @$admin->email_admin;?>" class="form-control" placeholder="Email" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Tempat & Tanggal Lahir</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <input type="text" name="tempat_lahir_admin" class="form-control" value="<?php echo @$admin->tempat_lahir_admin;?>" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" name="tanggal_lahir_admin" value="<?php echo @$admin->tanggal_lahir_admin;?>" data-plugin-datepicker data-date-format="yyyy-mm-dd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Program Studi </label>
                    <div class="col-sm-9">
                        <input type="text" name="program_studi_admin" class="form-control" value="<?php echo @$admin->program_studi_admin;?>" placeholder="Program Studi"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Pendidikan Akhir </label>
                    <div class="col-sm-9">
                        <input type="text" name="pendidikan_tertinggi_admin" class="form-control" value="<?php echo @$admin->pendidikan_tertinggi_admin;?>" placeholder="Pendidikan Akhir"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jabatan </label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan_admin" class="form-control" value="<?php echo @$admin->jabatan_admin;?>" placeholder="Jabatan" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textareaDefault">Alamat</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="alamat_admin" rows="3" id="textareaDefault"><?php echo @$admin->alamat_admin;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Telephone </label>
                    <div class="col-sm-9">
                        <input type="text" name="handphone_admin" class="form-control" value="<?php echo @$admin->handphone_admin;?>" placeholder="Telephone" />
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url('admin_master/master_administrator');?>" class="btn btn-success">Cancel</a>
                    </div>
                </div>
            </footer>
        </section>
        </form>    
    </div>
</div>