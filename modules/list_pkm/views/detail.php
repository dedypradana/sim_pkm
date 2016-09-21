<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <?php if($edit){ ?>
        <form enctype="multipart/form-data" accept-charset="utf-8" id="form" action="<?php echo base_url('pendaftaran_pkm/editPendaftaran');?>" class="form-horizontal form-bordered" method="post">
            <input type="hidden" name="id_daftar" value="<?php echo @$c_pkm->id_daftar;?>">    
            <?php if(@$c_pkm->u_berkas){ ?>
            <div id="e_u_berkas"><input type="hidden" name="t_u_berkas" value="<?php echo @$c_pkm->u_berkas;?>"></div>    
            <?php } ?>
            <?php if(@$c_pkm->u_lampiran){ ?>
            <div id="e_u_lampiran"><input type="hidden" name="t_u_lampiran" value="<?php echo @$c_pkm->u_lampiran;?>"></div>    
            <?php } ?>
        <?php }else{ ?>
        <form enctype="multipart/form-data" accept-charset="utf-8" id="form" action="<?php echo base_url('pendaftaran_pkm/savePendaftaran');?>" class="form-horizontal form-bordered" method="post">
        <?php } ?>
            <section class="panel panel-primary" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Form Pendaftaran PKM</h2>
                </header>
                <div class="panel-body">
                    <?php echo @$this->session->flashdata('flash_data'); ?>
                    <div class="alert alert-info">
                        Masukkan NIM, Nama, Jurusan, Telephone, Email, Alamat <strong>Data Ketua PKM</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nim *</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM" value="<?php echo @$c_pkm->nim;?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama *</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo @$c_pkm->nama;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Jurusan *</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan" value="<?php echo @$c_pkm->jurusan;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Telephone *</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="telp" id="telp" class="form-control" placeholder="Telephone" value="<?php echo @$c_pkm->telp;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email *</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-envelope"></i></span>
                                </span>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo @$c_pkm->email;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Alamat" required>Alamat *</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="alamat" rows="3" id="alamat" <?php echo $c_daftar ? 'readonly':'';?> required><?php echo @$c_pkm->alamat;?></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        Masukkan NIM, Nama <strong>Data Anggota PKM</strong>.
                    </div>
                    <?php if($c_daftar){ ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button">Data Anggota</label>
                        <div class="col-md-9">
                            <div class="col-lg-12">
                                <ol>
                                    <?php foreach($c_anggota as $rec){ ?>
                                    <li>(<?php echo @$rec->nim_mahasiswa;?>) <?php echo @$rec->nama_mahasiswa;?>, <?php echo @$rec->jurusan;?>, Status : <?php echo @$rec->status==0 ? '<font style="color:#f00">Belum Diterima</font>':'<font style="color:#00f">Diterima</font>';?></li>
                                    <?php } ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <?php if($edit){ ?>
                    <?php 
                        $init = 1;
                        if(isset($c_anggota))foreach($c_anggota as $rec){ 
                    ?>
                    <div class="form-group" id="fd_<?php echo $init;?>">
                      <label class="col-md-3 control-label">Anggota</label>
                           <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="nim_anggota[]" value="<?php echo @$rec->nim_mahasiswa;?>" class="form-control" placeholder="NIM">
                                </div>
                                <div class="visible-xs mb-md"></div>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_anggota[]" value="<?php echo @$rec->nama_mahasiswa;?>" class="form-control" placeholder="Nama">
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" onclick="rm(<?php echo $init;?>,<?php echo @$rec->id_map;?>);" class="btn btn-danger" title="Hapus Anggota">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $init++;} ?>
                    <?php } ?>
                    <div class="form-group input_fields_wrap"></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button">Tambahkan Anggota</label>
                        <div class="col-md-6">
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary add_field_button">
                                <i class="fa fa-plus-circle"></i> Tambah Anggota
                            </button>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="alert alert-info">
                        Masukkan NIDN, Nama, Alamat <strong>Data Dosen</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">NIDN</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nip_dn" id="nip_dn" class="form-control" placeholder="NIDN" value="<?php echo @$c_pkm->nip_dn;?>" <?php echo $c_daftar ? 'readonly':'';?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Dosen</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nama_dn" id="nama_dn" class="form-control" placeholder="Lengkap dengan title" value="<?php echo @$c_pkm->nama_dn;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email Dosen</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-envelope"></i></span>
                                </span>
                                <input type="text" name="email_dn" id="email_dn" class="form-control" placeholder="Email" value="<?php echo @$c_pkm->email_dn;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Alamat">Alamat Dosen</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="alamat_dn" rows="3" id="alamat_dn" <?php echo $c_daftar ? 'readonly':'';?>><?php echo @$c_pkm->alamat_dn;?></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        Masukkan Berkas-berkas <strong>Data PKM</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Judul</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="judul" rows="3" id="judul" <?php echo $c_daftar ? 'readonly':'';?> required><?php echo @$c_pkm->judul;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bidang Kegiatan PKM</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="bidang" id="bidang" class="form-control" placeholder="Bidang Kegiatan PKM" value="<?php echo @$c_pkm->bidang;?>" <?php echo $c_daftar ? 'readonly':'';?> required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Dana Hibah PKM</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="d_hibah" id="d_hibah" class="form-control" placeholder="Dana Hibah PKM" value="<?php echo @$c_pkm->d_hibah;?>" <?php echo $c_daftar ? 'readonly':'';?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Dana Masyarakat PKM</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="d_mas" id="d_mas" class="form-control" placeholder="Dana Masyarakat PKM" value="<?php echo @$c_pkm->d_mas;?>" <?php echo $c_daftar ? 'readonly':'';?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Upload Berkas PKM</label>
                        <div id="f_u_berkas"></div>
                        <div class="col-md-7" id="u_berkas">
                            <?php if($c_daftar){ ?>
                            <a href="<?php echo base_url();?>assets/uploads/<?php echo @$c_pkm->u_berkas;?>" target="_blank" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-download"></i> <?php echo @$c_pkm->u_berkas;?></a>
                            <?php }else{ ?>
                            <?php if(@$c_pkm->u_berkas){ ?>
                            <a href="<?php echo base_url();?>assets/uploads/<?php echo @$c_pkm->u_berkas;?>" target="_blank" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-download"></i> <?php echo @$c_pkm->u_berkas;?></a>
                            <button type="button" onclick="doDelete('berkas','<?php echo @$c_pkm->id_daftar;?>');" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary"><i class="fa fa-minus-circle"></i> Delete</button>
                            <?php }else{ ?>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Select file</span>
                                        <input type="file" name="u_berkas" />
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Lampiran PKM</label>
                        <div id="f_u_lampiran"></div>
                        <div class="col-md-7" id="u_lampiran">
                            <?php if($c_daftar){ ?>
                            <a href="<?php echo base_url();?>assets/uploads/<?php echo @$c_pkm->u_lampiran;?>" target="_blank" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-download"></i> <?php echo @$c_pkm->u_lampiran;?></a>
                            <?php }else{ ?>
                            <?php if(@$c_pkm->u_lampiran){ ?>
                            <a href="<?php echo base_url();?>assets/uploads/<?php echo @$c_pkm->u_lampiran;?>" target="_blank" class="mb-xs mt-xs mr-xs btn btn-sm btn-success"><i class="fa fa-download"></i> <?php echo @$c_pkm->u_lampiran;?></a>
                            <button type="button" onclick="doDelete('lampiran','<?php echo @$c_pkm->id_daftar;?>');" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary"><i class="fa fa-minus-circle"></i> Delete</button>
                            <?php }else{ ?>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Select file</span>
                                        <input type="file" name="u_lampiran"/>
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <?php if($non_ketua){ ?>
                            <a href="<?php echo base_url('pendaftaran_pkm/edit/'.encode($this->admin['id']));?>" class="btn btn-primary">Edit PKM</a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url('list_pkm');?>" class="btn btn-warning">Cancel</a>
                            <?php } ?>
                        </div>
                    </div>
                </footer>
            </section>
        </form>    
    </div>
</div>
<script>
    $(document).ready(function () {
        var max_fields = 9999999999; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        <?php if($edit){ ?>
            var x = <?php echo $init;?>; //initlal text box count
        <?php }else{ ?>
            var x = 1; //initlal text box count
        <?php } ?>
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-group" id="fd_' + x + '">\n\
                      <label class="col-md-3 control-label">Anggota</label>\n\
                           <div class="col-sm-8">\n\
                            <div class="row">\n\
                                <div class="col-sm-5">\n\
                                    <input type="text" name="nim_anggota[]" class="form-control" placeholder="NIM">\n\
                                </div>\n\
                                <div class="visible-xs mb-md"></div>\n\
                                <div class="col-sm-6">\n\
                                    <input type="text" name="nama_anggota[]" class="form-control" placeholder="Nama">\n\
                                </div>\n\
                                <div class="col-sm-1">\n\
                                    <button type="button" onclick="rm(' + x + ');" class="btn btn-danger" title="Hapus Anggota">\n\
                                        <i class="fa fa-minus-circle"></i>\n\
                                    </button>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
    function rm(id,param='') {
        <?php if($edit){ ?>
        $.ajax({
            type: 'POST',
            data: 'id_map='+param,
            url: "<?php echo base_url('pendaftaran_pkm/deleteAnggota'); ?>",
            success: function(data) {
                $('#fd_' + id).remove();
            }
        });
        <?php } ?>
        $('#fd_' + id).remove();
    }
    function doDelete(field='',param=''){
        $.ajax({
            type: 'POST',
            data: 'field='+field+'&param='+param,
            url: "<?php echo base_url('pendaftaran_pkm/deleteFile'); ?>",
            success: function(data) {
                if(field=='berkas'){
                    $('#u_berkas').remove();
                    $('#e_u_berkas').remove();
                    $("#f_u_berkas").html(data);
                }else{
                    $('#u_lampiran').remove();
                    $('#e_u_lampiran').remove();
                    $("#f_u_lampiran").html(data);
                }
            }
        });
    }
</script>