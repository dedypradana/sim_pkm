<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-tertiary" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Data List PKM</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?> 
                <table class="table table-bordered table-striped table-hover mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th width="50%">Judul</th>
                            <th>Ketua</th>
                            <th>Bidang</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_pkm as $rec){ 
                            $c_anggota = $this->mi->checkAnggota($nim,$rec->id_daftar);?>
                            <tr class="gradeX">
                                <td><?php echo @$rec->judul;?></td>
                                <td><?php echo @$rec->nama;?></td>
                                <td><?php echo @$rec->bidang;?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url('list_pkm/view/'.$rec->id_mahasiswa);?>" title="Detail PKM" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-search fa-1x"></i>
                                    </a>
                                    <?php if(!$c_anggota){ ?>
                                    <a href="<?php echo base_url('list_pkm/daftarAnggota/'.$rec->id_daftar);?>" title="Daftar Anggota" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>