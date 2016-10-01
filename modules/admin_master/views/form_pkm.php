<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <?php if($edit){ ?>
        <form enctype="multipart/form-data" accept-charset="utf-8" id="form" action="<?php echo base_url('pendaftaran_pkm/editPendaftaran/admin');?>" class="form-horizontal form-bordered" method="post">
            <input type="hidden" name="id_daftar" value="<?php echo @$c_pkm->id_daftar;?>">    
            <?php if(@$c_pkm->u_berkas){ ?>
            <div id="e_u_berkas"><input type="hidden" name="t_u_berkas" value="<?php echo @$c_pkm->u_berkas;?>"></div>    
            <?php } ?>
            <?php if(@$c_pkm->u_lampiran){ ?>
            <div id="e_u_lampiran"><input type="hidden" name="t_u_lampiran" value="<?php echo @$c_pkm->u_lampiran;?>"></div>    
            <?php } ?>
        <?php }else{ ?>
        <form enctype="multipart/form-data" accept-charset="utf-8" id="form" action="<?php echo base_url('pendaftaran_pkm/savePendaftaran/admin');?>" class="form-horizontal form-bordered" method="post">
        <?php } ?>
            <section class="panel panel-primary" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                    </div>
                    <h2 class="panel-title">Form Pendaftaran PKM</h2>
                </header>
                <div class="panel-body">
                    <?php echo @$this->session->flashdata('flash_data'); ?>
                    <div class="alert alert-info">
                        Masukkan <strong>Data Ketua PKM</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nim *</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM" value="<?php echo @$c_pkm->nim_mahasiswa;?>" readonly>
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
                        Masukkan <strong>Data Anggota PKM</strong>.
                    </div>
                    <?php if($c_daftar){ ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button">Data Anggota</label>
                        <div class="col-md-9">
                            <div class="col-lg-12">
                                <ol>
                                    <?php foreach($c_anggota as $rec){ ?>
                                    <li>(<?php echo @$rec->nim_mahasiswa;?>) <?php echo @$rec->nama_mahasiswa;?>, <?php echo @$rec->jurusan;?></li>
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
                                <div class="col-sm-9">
                                    <select data-plugin-selectTwo name="nim_anggota[]" class="form-control populate"  placeholder="Nim / Nama Anggota">
                                        <option value=""></option>
                                        <optgroup label="Pilih Nim / Nama Anggota">
                                            <?php if($mhs){foreach($mhs as $m){ ?>
                                            <option value="<?php echo @$m->nim_mahasiswa; ?>" <?php if(@$m->nim_mahasiswa==@$rec->nim_mahasiswa){echo 'selected';}?>><?php echo @$m->nim_mahasiswa; ?> | <?php echo @$m->nama_mahasiswa; ?></option>
                                            <?php }} ?>
                                        </optgroup>
                                    </select>
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
                        Masukkan <strong>Data Dosen</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">NIDN</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <!--<input type="text" name="nip_dn" id="nip_dn" class="form-control" placeholder="NIDN" value="<?php // echo @$c_pkm->nip_dn;?>" <?php // echo $c_daftar ? 'readonly':'';?>>-->
                                <select data-plugin-selectTwo onchange="show_dosen(this.value);" name="nip_dn" id="nip_dn" class="form-control populate" placeholder="NIDN / Nama Dosen" <?php echo $c_daftar ? 'disabled':'';?> required>
                                    <option value=""><?php echo $c_daftar ? @$c_pkm->nip_dn.' | '.@$c_pkm->nama_dosen:'';?></option>
                                    <optgroup label="NIDN | Nama Dosen">
                                        <?php if($dosen){ foreach($dosen as $rec){ ?>
                                            <option value="<?php echo @$rec->nip_dosen;?>" <?php if(@$c_pkm->nip_dn==@$rec->nip_dosen){echo 'selected';}?>><?php echo @$rec->nip_dosen;?> | <?php echo @$rec->nama_dosen;?></option>
                                        <?php }} ?>
                                    </optgroup>
                                </select>
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
                        <label class="col-md-3 control-label">Abstrak</label>
                        <div class="col-md-9">
                            <?php if($c_daftar){ ?>
                            <?php echo @$c_pkm->abstrak;?>
                            <?php } else { ?>
                            <textarea class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }' name="abstrak"><?php echo @$c_pkm->abstrak;?></textarea>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bidang Kegiatan PKM</label>
                        <div class="col-md-4">
                            <div class="input-group input-group-icon">
                                <select data-plugin-selectTwo name="bidang_pkm" id="bidang_pkm" class="form-control populate"  placeholder="Bidang PKM" <?php echo $c_daftar ? 'disabled':'';?>>
                                    <option value=""></option>
                                    <optgroup label="Pilih Bidang PKM">
                                        <option value="PKM-P" <?php echo @$c_pkm->bidang_pkm=='PKM-P' ? 'selected' : '';?>>PKM-P</option>
                                        <option value="PKM-K" <?php echo @$c_pkm->bidang_pkm=='PKM-K' ? 'selected' : '';?>>PKM-K</option>
                                        <option value="PKM-M" <?php echo @$c_pkm->bidang_pkm=='PKM-M' ? 'selected' : '';?>>PKM-M</option>
                                        <option value="PKM-T" <?php echo @$c_pkm->bidang_pkm=='PKM-T' ? 'selected' : '';?>>PKM-T</option>
                                        <option value="PKM-KC" <?php echo @$c_pkm->bidang_pkm=='PKM-KC' ? 'selected' : '';?>>PKM-KC</option>
                                        <option value="PKM-GT" <?php echo @$c_pkm->bidang_pkm=='PKM-GT' ? 'selected' : '';?>>PKM-GT</option>
                                        <option value="PKM-AI" <?php echo @$c_pkm->bidang_pkm=='PKM-AI' ? 'selected' : '';?>>PKM-AI</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kelompok Bidang Ilmu</label>
                        <div class="col-md-4">
                            <div class="input-group input-group-icon">
                                <select data-plugin-selectTwo name="bidang_ilmu" id="bidang_ilmu" class="form-control populate" placeholder="Bidang Ilmu" <?php echo $c_daftar ? 'disabled':'';?>>
                                    <option value=""></option>
                                    <optgroup label="Pilih Bidang Ilmu">
                                        <option value="Bidang Kesehatan" <?php echo @$c_pkm->bidang_ilmu=='Bidang Kesehatan' ? 'selected' : '';?>>Bidang Kesehatan</option>
                                        <option value="Bidang MIPA" <?php echo @$c_pkm->bidang_ilmu=='Bidang MIPA' ? 'selected' : '';?>>Bidang MIPA</option>
                                        <option value="Bidang Sosial Ekonomi" <?php echo @$c_pkm->bidang_ilmu=='Bidang Sosial Ekonomi' ? 'selected' : '';?>>Bidang Sosial Ekonomi</option>
                                        <option value="Bidang Pendidikan" <?php echo @$c_pkm->bidang_ilmu=='Bidang Pendidikan' ? 'selected' : '';?>>Bidang Pendidikan</option>
                                        <option value="Bidang Pertanian" <?php echo @$c_pkm->bidang_ilmu=='Bidang Pertanian' ? 'selected' : '';?>>Bidang Pertanian</option>
                                        <option value="Bidang Teknologi dan Rekayasa" <?php echo @$c_pkm->bidang_ilmu=='Bidang Teknologi dan Rekayasa' ? 'selected' : '';?>>Bidang Teknologi dan Rekayasa</option>
                                        <option value="Bidang Humaniora" <?php echo @$c_pkm->bidang_ilmu=='Bidang Humaniora' ? 'selected' : '';?>>Bidang Humaniora</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Luaran yang diharapkan</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="luaran" id="luaran" class="form-control" placeholder="Luaran yang diharapkan" value="<?php echo @$c_pkm->luaran;?>" <?php echo $c_daftar ? 'readonly':'';?>>
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
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status Acc Dosen</label>
                        <div class="col-md-4">
                            <div class="input-group input-group-icon">
                                <select data-plugin-selectTwo name="acc_dosen" id="acc_dosen" class="form-control populate"  placeholder="Status Acc Dosen" <?php echo $c_daftar ? 'disabled':'';?>>
                                    <option value=""></option>
                                    <optgroup label="Pilih Status Dosen">
                                        <option value="0" <?php echo @$c_pkm->acc_dosen==0 ? 'selected' : '';?>>Belum</option>
                                        <option value="1" <?php echo @$c_pkm->acc_dosen==1 ? 'selected' : '';?>>Ditolak</option>
                                        <option value="2" <?php echo @$c_pkm->acc_dosen==2 ? 'selected' : '';?>>Diterima</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status Acc Admin</label>
                        <div class="col-md-4">
                            <div class="input-group input-group-icon">
                                <select data-plugin-selectTwo name="acc_admin" id="acc_admin" class="form-control populate"  placeholder="Status Acc Dosen" <?php echo $c_daftar ? 'disabled':'';?>>
                                    <option value=""></option>
                                    <optgroup label="Pilih Status Admin">
                                        <option value="0" <?php echo @$c_pkm->acc_admin==0 ? 'selected' : '';?>>Belum</option>
                                        <option value="1" <?php echo @$c_pkm->acc_admin==1 ? 'selected' : '';?>>Ditolak</option>
                                        <option value="2" <?php echo @$c_pkm->acc_admin==2 ? 'selected' : '';?>>Diterima</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <?php if($c_daftar){ ?>
                            <a href="<?php echo base_url('pendaftaran_pkm/edit/'.encode($this->admin['id']));?>" class="btn btn-primary">Edit PKM</a>
                            <?php }else{ ?>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Submit PKM</button>
                            <button onclick="history.go(-1);" class="btn btn-warning">Cancel</button>
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
        var max_fields = 10000000; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        <?php if($edit){ ?>
            var x = <?php echo $init;?>; //initlal text box count
        <?php }else{ ?>
            var x = 1; //initlal text box count
        <?php } ?>
        loadJS = function(src) {
            var jsLink = $("<script type='text/javascript' src='"+src+"'>");
            $("head").append(jsLink); 
        };
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $.ajax({
                    type: 'POST',
                    data: 'init='+x,
                    url: "<?php echo base_url('pendaftaran_pkm/getFormAnggota/'.@$c_pkm->nim_mahasiswa); ?>",
                    success: function(data) {
                        $(wrapper).append(data); //add input box
                        $("#fd_select"+x).select2();
                    }
                });                                            
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
    function show_dosen(nidn){
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('pendaftaran_pkm/get_dosen'); ?>",
            data: 'nidn='+nidn,
            dataType: "json",
            cache:false,
            success: function(data) {
                console.log(data);
                $('#nama_dn').val(data.nama_dosen);
                $('#email_dn').val(data.email_dosen);
                $('#alamat_dn').val(data.alamat_dosen);
            }
        });
    }
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