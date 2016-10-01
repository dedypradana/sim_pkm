<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-info" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Validasi Data PKM</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?> 
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
                        <?php if($list_pkm)foreach($list_pkm as $rec){?>
                            <tr class="gradeX">
                                <td><?php echo @$rec->judul;?></td>
                                <td><?php echo @$rec->bidang_ilmu.'('.@$rec->bidang_pkm.')';?></td>
                                <td><?php echo @$rec->nama_mahasiswa;?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url('validasi_pkm/detail_pkm/'.encode(@$rec->id_daftar));?>" data-toggle="tooltip" data-placement="top" title="Detail PKM" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-search fa-1x"></i>
                                    </a>
                                    <a href="<?php echo base_url('validasi_pkm/terima_pkm/'.encode(@$rec->id_daftar)); ?>" data-toggle="tooltip" data-placement="top" title="PKM Diterima" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#modalForm_<?php echo $rec->id_daftar;?>" data-toggle="tooltip" data-placement="top" title="PKM Ditolak" class="modal-with-form btn btn-default btn-sm btn-default">
                                        <i class="fa fa-close"></i>
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
<!-- Modal Form -->
<?php if($list_pkm)foreach($list_pkm as $r){?>
<div id="modalForm_<?php echo $r->id_daftar; ?>" class="modal-block modal-block-primary mfp-hide">
    <form class="form-horizontal mb-lg" accept-charset="utf-8" action="<?php echo base_url('validasi_pkm/tolak_pkm'); ?>" method="post">
        <input type="hidden" name="id_daftar" value="<?php echo $r->id_daftar; ?>">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">PKM Ditolak</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Catatan</label>
                    <div class="col-sm-9">
                        <textarea class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }' name="note" ></textarea>
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
<?php } ?>