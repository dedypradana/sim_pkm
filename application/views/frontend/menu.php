<nav class="nav-main mega-menu">
    <ul class="nav nav-pills nav-main" id="mainMenu">
        <li class="active">
            <a href="shortcodes.html">Beranda</a>
        </li>
        <li class="">
            <a href="shortcodes.html">Pengumuman</a>
        </li>
        <li class="">
            <a href="shortcodes.html">Tentang Kami</a>
        </li>
        <li class="">
            <a href="shortcodes.html">Bantuan</a>
        </li>
        <li class="dropdown mega-menu-item mega-menu-signin signin" id="">
            <a class="dropdown-toggle" href="<?php base_url();?>">
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
                                    <form action="<?php echo base_url('dashboard/auth_login');?>" method="post">
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
    </ul>
</nav>