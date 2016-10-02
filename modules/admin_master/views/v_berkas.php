<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-primary" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Validasi Data PKM</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?> 
                <a href="#modalForm" class="modal-with-form mb-xs mt-xs mr-xs btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Tambah</a>
                <hr>
                <table class="table table-bordered table-striped table-hover mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th width="40%">Judul</th>
                            <th>Bidang</th>
                            <th>Ketua</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($berkas)foreach($berkas as $rec){?>
                            <tr class="gradeX">
                                <td><?php echo @$rec->judul;?></td>
                                <td><?php echo @$rec->bidang_ilmu.' ('.@$rec->bidang_pkm.')';?></td>
                                <td><?php echo @$rec->nama_mahasiswa;?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url('admin_master/berkas_pkm/view/'.encode(@$rec->id_daftar));?>" title="Detail" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-search fa-1x"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin_master/berkas_pkm/edit/'.encode(@$rec->nim)); ?>" title="Edit" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin_master/berkas_pkm/delete/'.encode(@$rec->id_daftar));?>" 
                                    onclick="javascript:return confirm('Are you absolutely sure you want to delete?')" 
                                    title="Delete" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <form class="form-horizontal mb-lg" accept-charset="utf-8" action="<?php echo base_url('admin_master/add_nim'); ?>" method="post">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Pilih Nim atau Nama Mahasiswa</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nim / Nama</label>
                    <div class="col-sm-9">
                        <select data-plugin-selectTwo class="form-control populate" name="nim">
                            <option value=""></option>
                            <optgroup label="Pilih Nim / Nama Mahasiswa">
                                <?php if($mhs)foreach($mhs as $rec){ ?>
                                <option value="<?php echo @$rec->nim_mahasiswa;?>"><?php echo @$rec->nim_mahasiswa.' | '.@$rec->nama_mahasiswa;?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </form>
</div>