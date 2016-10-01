<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <?php echo strtoupper(@$this->admin['tipe']);?>
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="<?php if($this->s1=='admin_dashboard'){echo 'nav-active';}?>">
                        <a href="<?php echo base_url('admin_dashboard');?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if($this->admin['tipe']=='mahasiswa'){ ?>
                    <li class="<?php if($this->s1=='pendaftaran_pkm'){echo 'nav-active';}?>">
                        <a href="<?php echo base_url('pendaftaran_pkm');?>">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <span>Pendaftaran PKM</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->admin['tipe']=='dosen'){ ?>
                    <li class="<?php if($this->s1=='validasi_pkm'){echo 'nav-active';}?>">
                        <a href="<?php echo base_url('validasi_pkm');?>">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <span>Validasi Berkas PKM</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->admin['tipe']=='administrator'){ ?>
                    <li class="nav-parent <?php if($this->s1=='admin_master'){echo 'nav-expanded nav-active';}?>">
                        <a>
                            <i class="fa fa-database" aria-hidden="true"></i>
                            <span>Kelola Data</span>
                        </a>
                        <ul class="nav nav-children">
                            <li <?php if($this->s2=='master_administrator'){echo 'class="nav-active"';}?>>
                                <a href="<?php echo base_url('admin_master/master_administrator');?>">
                                    Administrator
                                </a>
                            </li>
                            <li <?php if($this->s2=='master_dosen'){echo 'class="nav-active"';}?>>
                                <a href="<?php echo base_url('admin_master/master_dosen');?>">
                                    Dosen
                                </a>
                            </li>
                            <li <?php if($this->s2=='master_mahasiswa'){echo 'class="nav-active"';}?>>
                                <a href="<?php echo base_url('admin_master/master_mahasiswa');?>">
                                    Mahasiswa
                                </a>
                            </li>
                            <li <?php if($this->s2=='berkas_pkm'){echo 'class="nav-active"';}?>>
                                <a href="<?php echo base_url('admin_master/berkas_pkm');?>">
                                    Berkas PKM
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($this->s1=='validasi_pkm'){echo 'nav-active';}?>">
                        <a href="<?php echo base_url('validasi_pkm');?>">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <span>Validasi Berkas PKM</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="<?php if($this->s1=='search_berkas'){echo 'nav-active';}?>">
                        <a href="<?php echo base_url('search_berkas');?>">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>List Berkas PKM</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <hr class="separator" />

            <div class="sidebar-widget widget-tasks">
                <div class="widget-header">
                    <h6>Frontend</h6>
                    <div class="widget-toggle">+</div>
                </div>
                <div class="widget-content">
                    <ul class="list-unstyled m-none">
                        <li><a href="<?php echo base_url();?>" target="_blank">Halaman Utama</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</aside>
<!-- end: sidebar -->