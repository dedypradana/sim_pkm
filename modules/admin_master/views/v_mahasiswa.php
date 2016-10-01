<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-quartenary" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Data Mahasiswa</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?> 
                <a href="<?php echo base_url('admin_master/master_mahasiswa/add');?>" class="mb-xs mt-xs mr-xs btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Tambah</a>
                <hr>
                <table class="table table-bordered table-striped table-hover mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($mhs)foreach($mhs as $rec){ ?>
                            <tr class="gradeX">
                                <td><?php echo @$rec->nim_mahasiswa;?></td>
                                <td><?php echo @$rec->nama_mahasiswa;?></td>
                                <td><?php echo @$rec->email_mahasiswa;?></td>
                                <td><?php echo @$rec->username;?></td>
                                <td><?php echo @$rec->jurusan;?></td>
                                <td><?php if(@$rec->status==1){echo 'Active';}else{echo 'Non Active';}?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url('admin_master/master_mahasiswa/view/'.encode(@$rec->id_mahasiswa));?>" title="Detail" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-search fa-1x"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin_master/master_mahasiswa/edit/'.encode(@$rec->id_mahasiswa));?>" title="Edit"class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin_master/master_mahasiswa/delete/'.encode(@$rec->id_mahasiswa));?>" onclick="javascript:return confirm('Are you absolutely sure you want to delete?')" title="Delete" class="btn btn-default btn-sm btn-default">
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