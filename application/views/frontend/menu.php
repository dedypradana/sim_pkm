<!-- BEGIN HEADER -->
<?php 
// Get Segment
$sg1 = $this->uri->segment(1);
$sg2 = $this->uri->segment(2);
?>
<div class="header">
    <div class="container">
        <a class="site-logo" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url(); ?>assets/uploads/img/logo-corp.png" alt="Employee Engagement Survey"></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
            <ul>
                <li class="<?php if($sg1=='dashboard'){echo 'active';}?>">
                    <a href="<?php echo base_url('dashboard'); ?>">Homepage</a>
                </li>
                <li class="<?php if($sg1=='survey'){echo 'active';}?>">
                    <a href="<?php echo base_url('survey'); ?>">Survey Area</a>
                </li>
                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div> 
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->