<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-tertiary" id="panel-3" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Data Administrator</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?> 
                <a href="<?php echo base_url('admin_master/master_administrator/add');?>" class="mb-xs mt-xs mr-xs btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Tambah</a>
                <hr>
                <table class="table table-bordered table-striped table-hover mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($administrator as $rec){ ?>
                            <tr class="gradeX">
                                <td><?php echo @$rec->nip_admin;?></td>
                                <td><?php echo @$rec->nama_admin;?></td>
                                <td><?php echo @$rec->email_admin;?></td>
                                <td><?php echo @$rec->username;?></td>
                                <td><?php echo @$rec->jenis_kelamin_admin;?></td>
                                <td class="actions">
                                    <a href="<?php echo base_url('admin_master/master_administrator/view/'.@$rec->id_admin);?>" title="Detail" class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-search fa-1x"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin_master/master_administrator/edit/'.@$rec->id_admin);?>" title="Edit"class="btn btn-default btn-sm btn-default">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin_master/master_administrator/delete/'.@$rec->id_admin);?>" title="Delete" class="btn btn-default btn-sm btn-default">
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