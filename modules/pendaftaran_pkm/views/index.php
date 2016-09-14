<div class="row">
    <div class="col-md-12" data-plugin-portlet id="portlet-1">
        <form id="form" action="" class="form-horizontal" method="post">
            <section class="panel panel-primary" data-portlet-item>
                <header class="panel-heading portlet-handler">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Form Pendaftaran PKM</h2>
                </header>
                <div class="panel-body">
                    
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="button" onclick="form_anggota();" class="btn btn-primary">Submit</button>
                            <a href="<?php echo base_url('admin_master/master_dosen'); ?>" class="btn btn-success">Cancel</a>
                        </div>
                    </div>
                </footer>
            </section>
        </form>    
    </div>
</div>
<script type="text/javascript">
    function form_anggota(){
        $.ajax({
            type: 'POST',
            data: '',
            url: "<?php echo base_url(''); ?>",
            success: function(data) {
            }
        });
    }
</script>