<?php foreach ($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet purple box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i> Kelola Gallery Website
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <?php echo $output;?>
            </div>
        </div>
    </div>
</div>
