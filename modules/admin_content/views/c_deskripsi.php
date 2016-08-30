<div class="portlet box purple">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Form Deskripsi
        </div>
        <div class="tools">
            <a href="" class="collapse">
            </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal">
            <input type="hidden" id="id_gallery" name="id_gallery" value="<?php echo @$image->id; ?>">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Nama File</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm" readonly placeholder="File Name" value="<?php echo @$image->path; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Kategori</label>
                    <div class="col-md-9">
                        <select class="form-control input-sm" name="kategori" id="kategori">
                            <option value="">- Choose Category -</option>
                            <?php foreach($kategori as $rec){ ?>
                            <option value="<?php echo $rec->id?>" <?php if($image->kategori==$rec->id){echo'selected';}?>><?php echo $rec->nama_kategori?></option>    
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Deskripsi</label>
                    <textarea class="form-control col-md-3" name="deskripsi" id="deskripsi" style="width: 71%;margin-left: 14px;" rows="3"><?php echo @$image->deskripsi;?></textarea>
                </div>
            </div>
            <div class="form-actions right1">
                <button type="button" onclick="$(window).colorbox.close();" class="btn default">Cancel</button>
                <button type="button" onclick="insert_deskripsi();" class="btn green">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
function insert_deskripsi(){
    var id_gallery = $('#id_gallery').val();
    var kategori = $('#kategori').val();
    var deskripsi = $('#deskripsi').val();
    $.ajax({
       type : "POST",
       url  : "<?php echo base_url(); ?>admin_content/doInsert",
       data : "id_gallery="+id_gallery+"&id_kategori="+kategori+"&deskripsi="+deskripsi,
       success: function(data){
           $(window).colorbox.close();
       }
    });
}
</script>