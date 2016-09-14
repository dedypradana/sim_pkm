<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-tertiary" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Detail Dosen</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?> 
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-none">
                        <thead>
                            <tr>
                                <th style="width: 10%;">No</th>
                                <th style="width: 35%;">Field Name</th>
                                <th style="width: 1%;"></th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>NIP</td>
                                <td>:</td>
                                <td><?php echo @$dosen->nip_dosen;?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?php echo @$dosen->nama_dosen;?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tempat, Tgl Lahir</td>
                                <td>:</td>
                                <td><?php echo @$dosen->tempat_lahir_dosen;?>, <?php echo tgl_indo(@$dosen->tanggal_lahir_dosen);?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo @$dosen->jenis_kelamin_dosen;?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td><?php echo @$dosen->program_studi_dosen;?></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Pendidikan Terakhir</td>
                                <td>:</td>
                                <td><?php echo @$dosen->pendidikan_tertinggi_dosen;?></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo @$dosen->alamat_dosen;?></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Telephone</td>
                                <td>:</td>
                                <td><?php echo @$dosen->handphone_dosen;?></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo @$dosen->email_dosen;?></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Status Dosen</td>
                                <td>:</td>
                                <td><?php echo @$dosen->status_dosen;?></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Status Ikatan Dosen</td>
                                <td>:</td>
                                <td><?php echo @$dosen->status_ikatan_kerja_dosen;?></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Username</td>
                                <td>:</td>
                                <td><?php echo @$dosen->username;?></td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Password (Encrypted)</td>
                                <td>:</td>
                                <td><?php echo @$dosen->password;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <a href="<?php echo base_url('admin_master/master_dosen/edit/'.encode($id));?>"class="btn btn-primary">Edit</a>
                        <?php if($sesi['tipe'] == 'administrator'){ ?>
                        <a href="<?php echo base_url('admin_master/master_dosen');?>" class="btn btn-success">Kembali</a>
                        <?php } ?>
                    </div>
                </div>
            </footer>
        </section>
    </div>
</div>