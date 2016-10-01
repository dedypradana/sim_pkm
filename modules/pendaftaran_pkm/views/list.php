<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <section class="panel panel-default" data-portlet-item>
            <header class="panel-heading portlet-handler">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Program Kreatifitas Mahasiswa</h2>
            </header>
            <div class="panel-body">
                <?php echo @$this->session->flashdata('flash_data'); ?>
                <div class="well success" style="font-size: 15px;text-align: center;">
                    Anda Telah Mendaftar Program Kreatifitas Mahasiswa dengan judul :<br>
                    <p class="lead"><?php echo @$pkm->judul; ?></p>
                </div>
                <div class="alert alert-info fade in nomargin center">
                    <?php if($pkm){ ?>
                    <p>
                        <button 
                            data-toggle="popover" 
                            data-container="body" 
                            data-placement="top" 
                            data-html="true"
                            title="<b><?php echo @$d_title;?></b>" 
                            data-content="<?php echo html_entity_decode(@$d_content);?>"
                            class="btn <?php echo @$d_warna;?> mt-xs mb-xs" type="button">Validasi Dosen : <?php echo @$d_status;?></button>
                        <button 
                            data-toggle="popover" 
                            data-container="body" 
                            data-placement="top" 
                            data-html="true"
                            title="<b><?php echo @$a_title;?><b>" 
                            data-content="<?php echo html_entity_decode(@$a_content);?>"
                            class="btn <?php echo @$a_warna;?> mt-xs mb-xs" type="button">Validasi CIC Student Center : <?php echo @$a_status;?></button>
                    </p>
                    <?php }else{ ?>
                    <p>
                        <button class="btn btn-info mt-xs mb-xs" style="cursor: default" type="button">Validasi Dosen : Belum</button>
                        <button class="btn btn-info mt-xs mb-xs" style="cursor: default" type="button">Validasi CIC Student Center : Belum</button>
                    </p>
                    <?php } ?>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="<?php echo base_url('pendaftaran_pkm/view'); ?>" class="btn btn-primary">Detail Data PKM</a>
                        <a href="<?php echo base_url('pendaftaran_pkm/edit/' . encode($this->admin['nim'])); ?>" class="btn btn-dark">Edit Data PKM</a>
                    </div>
                </div>
            </footer>
        </section>
    </div>
</div>