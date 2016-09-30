<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-success" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Detail PKM</h2>
            </header>
            <div class="panel-body">
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
                            <td><?php echo @$pkm->judul; ?></td>
                        </tr>
                        <tr>
                            <td>Bidang PKM</td>
                            <td><?php echo @$pkm->bidang_ilmu.' ('.@$pkm->bidang_pkm.')'; ?></td>
                        </tr>
                        <tr>
                            <td>Abstrak</td>
                            <td><?php echo @$pkm->abstrak; ?></td>
                        </tr>
                        <tr>
                            <td>Nim / Nama Ketua</td>
                            <td>(<?php echo @$pkm->nim_mahasiswa; ?>) <?php echo @$pkm->nama_mahasiswa; ?>, <?php echo @$pkm->jurusan; ?></td>
                        </tr>
                        <?php if ($anggota) {
                            $no = 1;
                            foreach ($anggota as $rec) { ?>
                                <tr>
                                    <td>Anggota <?php echo $no; ?></td>
                                    <td>(<?php echo @$rec->nim_anggota; ?>) <?php echo @$rec->nama_mahasiswa; ?>, <?php echo @$rec->jurusan; ?></td>
                                </tr>
                                <?php $no++;}} ?>
                        <tr>
                            <td>Status</td>
                            <td><?php echo @$pkm->acc_dosen == 2 ? 'Sudah Acc Dosen' : 'Belum Acc Dosen'; ?>, <?php echo @$pkm->acc_admin == 2 ? 'Sudah Acc Admin' : 'Belum Acc Admin'; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="button" onclick="history.go(-1);"  class="mb-xs mt-xs mr-xs btn btn-sm btn-primary">Kembali</button></td>
                        </tr>
                    </tbody>
                </table>
                <h3>File Berkas PKM</h3>
                <hr>
                <embed src="<?php echo base_url().'assets/uploads/'.@$pkm->u_berkas.'#toolbar=0&navpanes=0&scrollbar=0';?>" type="application/pdf" width="100%" height="400px;">
            </div>
        </section>
    </div>
</div>