<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
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
                    <li class="nav-parent <?php if($this->s1=='admin_master'){echo 'nav-expanded nav-active';}?>">
                        <a>
                            <i class="fa fa-database" aria-hidden="true"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="nav nav-children">
                            <li <?php if($this->s2=='master_administrator'){echo 'class="nav-active"';}?>>
                                <a href="<?php echo base_url('admin_master/master_administrator');?>">
                                    Administrator
                                </a>
                            </li>
                            <li>
                                <a href="pages-signin.html">
                                    Dosen
                                </a>
                            </li>
                            <li>
                                <a href="pages-recover-password.html">
                                    Mahasiswa
                                </a>
                            </li>
                        </ul>
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