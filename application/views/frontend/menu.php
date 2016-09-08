<nav class="nav-main mega-menu">
    <ul class="nav nav-pills nav-main" id="mainMenu">
        <li class="<?php if ($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') {echo 'active';} ?>">
            <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'daftar_akun') {echo 'active';} ?>">
            <a href="<?php echo base_url('daftar_akun'); ?>">Daftar Akun</a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'tentang_kami') {echo 'active';} ?>">
            <a href="<?php echo base_url('tentang_kami'); ?>">Tentang Kami</a>
        </li>
        <li class="<?php if ($this->uri->segment(1) == 'bantuan') {echo 'active';} ?>">
            <a href="<?php echo base_url('bantuan'); ?>">Bantuan</a>
        </li>
        <?php if ($this->session->userdata('admin_login')) { ?>
            <li class="dropdown mega-menu-item mega-menu-signin signin logged" id="headerAccount">
                <a class="dropdown-toggle" href="">
                    <i class="fa fa-user"></i> <?php echo $this->session->userdata('admin_login')['nama']; ?>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="mega-menu-content">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="user-avatar">
                                        <div class="img-thumbnail">
                                            <img src="<?php echo base_url(); ?>assets/frontend/img/clients/client-1.jpg" alt="">
                                        </div>
                                        <p>
                                            <strong><?php echo $this->session->userdata('admin_login')['nama']; ?></strong>
                                            <span><?php echo $this->session->userdata('admin_login')['tipe']; ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-account-options">
                                        <li>
                                            <a href="<?php echo base_url('admin_dashboard'); ?>">My Account</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('admin_login/logout');?>">Log Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        <?php } else { ?>
            <li class="dropdown mega-menu-item mega-menu-signin signin" id="">
                <a class="dropdown-toggle" href="">
                    <i class="fa fa-user"></i> Sign In
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="mega-menu-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="signin-form">
                                        <span class="mega-menu-sub-title">Sign In</span>
                                        <form action="<?php echo base_url('dashboard/auth_login'); ?>" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Username or E-mail Address</label>
                                                        <input type="text" id="uname" name="username" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Password</label>
                                                        <input type="password" id="passwd" name="passwd" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="submit" value="Login" class="btn btn-primary pull-right">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</nav>