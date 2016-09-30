<div class="col-md-12 col-lg-12 col-xl-6">
    <?php if ($ketua) { ?>
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-primary">
                <div class="panel-heading-icon">
                    <i class="fa fa-paperclip"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-weight-semibold mt-sm">PKM Sebagai Ketua, <?php echo @$ketua->bidang_ilmu; ?> (<?php echo @$ketua->bidang_pkm; ?>)</h3>
                <p style="font-size: 15px;"><a href="<?php echo base_url('admin_dashboard/detail_pkm/'.encode(@$ketua->id_daftar));?>" style="cursor: pointer;">Judul : <?php echo @$ketua->judul; ?></a></p>
            </div>
        </section>
    <?php } ?>
    <?php if ($info) {foreach ($info as $rec) { ?>
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-primary">
                <div class="panel-heading-icon">
                    <i class="fa fa-paperclip"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-weight-semibold mt-sm">Anggota PKM, <?php echo @$rec->bidang_ilmu; ?> (<?php echo @$rec->bidang_pkm; ?>)</h3>
                <p style="font-size: 15px;"><a href="<?php echo base_url('admin_dashboard/detail_pkm/'.encode(@$rec->id_daftar));?>" style="cursor: pointer;">Judul : <?php echo @$rec->judul; ?></a></p>
            </div>
        </section>
    <?php }} ?>
    <?php if ($dosen) {foreach ($dosen as $rec) { ?>
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-primary">
                <div class="panel-heading-icon">
                    <i class="fa fa-paperclip"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-weight-semibold mt-sm">Pembimbing PKM, <?php echo @$rec->bidang_ilmu; ?> (<?php echo @$rec->bidang_pkm; ?>)</h3>
                <p style="font-size: 15px;"><a href="<?php echo base_url('admin_dashboard/detail_pkm/'.encode(@$rec->id_daftar));?>" style="cursor: pointer;">Judul : <?php echo @$rec->judul; ?></a></p>
            </div>
        </section>
    <?php }} ?>
    <?php if ($admin) {foreach ($admin as $rec) { ?>
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-primary">
                <div class="panel-heading-icon">
                    <i class="fa fa-paperclip"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-weight-semibold mt-sm">Validasi Admin PKM, <?php echo @$rec->bidang_ilmu; ?> (<?php echo @$rec->bidang_pkm; ?>)</h3>
                <p style="font-size: 15px;"><a href="<?php echo base_url('admin_dashboard/detail_pkm/'.encode(@$rec->id_daftar));?>" style="cursor: pointer;">Judul : <?php echo @$rec->judul; ?></a></p>
            </div>
        </section>
    <?php }} ?>
    <?php if(!$info && !$ketua && !$dosen && !$admin){ ?>
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-white">
                <div class="panel-heading-icon bg-primary mt-sm">
                    <i class="fa fa-info"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-weight-semibold mt-sm">Belum ada informasi (<?php echo $this->admin['nama']?>)</h3>
                <p style="font-size: 15px;">Belum ada informasi PKM untuk anda..</p>
            </div>
        </section>
    <?php } ?>
</div>