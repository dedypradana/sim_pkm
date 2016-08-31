<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-tertiary" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title">Detail Administrator</h2>
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
                                <td><?php echo @$admin->nip_admin;?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><?php echo @$admin->nama_admin;?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tempat, Tgl Lahir</td>
                                <td>:</td>
                                <td><?php echo @$admin->tempat_lahir_admin;?>, <?php echo tgl_indo(@$admin->tanggal_lahir_admin);?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?php echo @$admin->jenis_kelamin_admin;?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td><?php echo @$admin->program_studi_admin;?></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Pendidikan Terakhir</td>
                                <td>:</td>
                                <td><?php echo @$admin->pendidikan_tertinggi_admin;?></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td><?php echo @$admin->jabatan_admin;?></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo @$admin->alamat_admin;?></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Telephone</td>
                                <td>:</td>
                                <td><?php echo @$admin->handphone_admin;?></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo @$admin->email_admin;?></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Username</td>
                                <td>:</td>
                                <td><?php echo @$admin->username;?></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Password (Encrypted)</td>
                                <td>:</td>
                                <td><?php echo @$admin->password;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <a href="<?php echo base_url('admin_master/master_administrator/edit/'.$id);?>"class="btn btn-primary">Edit</a>
                        <a href="<?php echo base_url('admin_master/master_administrator');?>" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </footer>
        </section>
    </div>
</div>