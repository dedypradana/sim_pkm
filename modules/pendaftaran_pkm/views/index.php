<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <form enctype="multipart/form-data" accept-charset="utf-8" id="form" action="<?php echo base_url('pendaftaran_pkm/savePendaftaran');?>" class="form-horizontal form-bordered" method="post">
            <section class="panel panel-primary" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Form Pendaftaran PKM</h2>
                </header>
                <div class="panel-body">
                    <div class="alert alert-info">
                        Masukkan NIM, Nama, Jurusan, Telephone, Email, Alamat <strong>Data Ketua PKM</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nim</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Jurusan</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Jurusan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Telephone</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="telp" id="telp" class="form-control" placeholder="Telephone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-envelope"></i></span>
                                </span>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Alamat">Alamat</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="alamat" rows="3" id="alamat"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        Masukkan NIM, Nama, Jurusan <strong>Data Anggota PKM</strong>.
                    </div>
                    <!--                    <div class="form-group">-->
                    <div class="form-group input_fields_wrap"></div>
                    <!--                    </div>-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button">Tambahkan Anggota</label>
                        <div class="col-md-6">
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary add_field_button">
                                <i class="fa fa-plus-circle"></i> Tambah Anggota
                            </button>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        Masukkan NIP, Nama, Alamat <strong>Data Dosen</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">NIP</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="nip_dn" id="nip_dn" class="form-control" placeholder="NIP">
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
                                <input type="text" name="nama_dn" id="nama_dn" class="form-control" placeholder="Lengkap dengan title">
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
                                <input type="text" name="email_dn" id="email_dn" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Alamat">Alamat Dosen</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="alamat_dn" rows="3" id="alamat_dn"></textarea>
                        </div>
                    </div>
                    <div class="alert alert-info">
                        Masukkan Berkas-berkas <strong>Data PKM</strong>.
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Judul</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bidang Kegiatan PKM</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-chevron-circle-right"></i></span>
                                </span>
                                <input type="text" name="bidang" id="bidang" class="form-control" placeholder="Bidang Kegiatan PKM">
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
                                <input type="text" name="d_hibah" id="d_hibah" class="form-control" placeholder="Dana Hibah PKM">
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
                                <input type="text" name="d_mas" id="d_mas" class="form-control" placeholder="Dana Masyarakat PKM">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Upload Berkas PKM</label>
                        <div class="col-md-7">
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Lampiran PKM</label>
                        <div class="col-md-7">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Select file</span>
                                        <input type="file" name="u_lampiran" />
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo base_url('admin_master/master_dosen'); ?>" class="btn btn-success">Cancel</a>
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

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-group" id="fd_' + x + '">\n\
                      <label class="col-md-3 control-label">Anggota</label>\n\
                           <div class="col-sm-8">\n\
                            <div class="row">\n\
                                <div class="col-sm-3">\n\
                                    <input type="text" name="nim[]" class="form-control" placeholder="NIM">\n\
                                </div>\n\
                                <div class="visible-xs mb-md"></div>\n\
                                <div class="col-sm-4">\n\
                                    <input type="text" name="nama[]" class="form-control" placeholder="Nama">\n\
                                </div>\n\
                                <div class="visible-xs mb-md"></div>\n\
                                <div class="col-sm-4">\n\
                                    <input type="text" name="jurusan[]" class="form-control" placeholder="Jurusan">\n\
                                </div>\n\
                                <div class="col-sm-1">\n\
                                    <button type="button" onclick="rm(' + x + ');" class="btn btn-danger">\n\
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
    function rm(id) {
        $('#fd_' + id).remove();
    }
</script>