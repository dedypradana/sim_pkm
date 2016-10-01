<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="<?php echo base_url(); ?>" class="logo">
            <img src="<?php echo base_url(); ?>assets/backend/images/logo.png" height="35" alt="Porto Admin" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">
        

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="<?php echo base_url(); ?>assets/backend/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo base_url(); ?>assets/backend/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    <span class="name"><?php echo @$this->admin['nama']?></span>
                    <span class="role"><?php echo @$this->admin['tipe']?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <?php $sesi = $this->session->userdata('admin_login');?>
                        <?php if($sesi['tipe']=='mahasiswa'){ ?>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url('admin_master/master_mahasiswa/view/'.encode($sesi['id']));?>"><i class="fa fa-user"></i> My Profile</a>
                        <?php } else if($sesi['tipe']=='dosen') { ?>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url('admin_master/master_dosen/view/'.encode($sesi['id']));?>"><i class="fa fa-user"></i> My Profile</a>
                        <?php } ?>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url('admin_login/logout');?>"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->