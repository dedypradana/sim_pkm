<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <form enctype="multipart/form-data" accept-charset="utf-8" id="form" action="<?php echo base_url('pendaftaran_pkm/savePendaftaran'); ?>" class="form-horizontal form-bordered" method="post">
            <section class="panel panel-quartenary" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Data Pendaftaran PKM</h2>
                </header>
                <div class="panel-body">
                    <?php echo @$this->session->flashdata('flash_data'); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-none">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Field</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Judul PKM</td>
                                    <td><?php echo @$pkm->judul;?></td>
                                </tr>
                                <tr>
                                    <td>Dosen</td>
                                    <td><?php echo @$pkm->nama_dn;?></td>
                                </tr>
                                <tr>
                                    <td>Bidang Kegiatan</td>
                                    <td><?php echo @$pkm->bidang;?></td>
                                </tr>
                                <tr>
                                    <td>Nim / Nama Ketua</td>
                                    <td>(<?php echo @$pkm->nim;?>) <?php echo @$pkm->nama;?>, <?php echo @$pkm->jurusan;?></td>
                                </tr>
                                <?php if($anggota){ $no = 1;foreach($anggota as $rec){ ?>
                                <tr>
                                    <td>Anggota <?php echo $no;?></td>
                                    <td>(<?php echo @$rec->nim;?>) <?php echo @$rec->nama;?>, <?php echo @$rec->jurusan;?></td>
                                </tr>
                                <?php $no++; }} ?>
                                <tr>
                                    <td>Status</td>
                                    <td><?php echo @$rec->acc_dosen != 1 ? 'Belum Acc Dosen' : 'Sudah Acc Dosen';?>, <?php echo @$rec->acc_admin != 1 ? 'Belum Acc Admin' : 'Sudah Acc Admin';?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <a href="<?php echo base_url('pendaftaran_pkm/view');?>" class="btn btn-primary">Detail Data PKM</a>
                            <a href="<?php echo base_url('pendaftaran_pkm/edit/'.encode($this->admin['id']));?>" class="btn btn-warning">Edit Data PKM</a>
                        </div>
                    </div>
                </footer>
            </section>
        </form>    
    </div>
</div>