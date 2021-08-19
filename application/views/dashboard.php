<!-- Main content -->
<section class="content">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="https://suradi.malangkota.go.id/assets/admin-lte/dist/img/user-avatar.png" alt="SuradiLogo" height="60" width="60">
    </div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?= date('D'); ?></h3>
                    <p><?= date('d'); ?> <?= date('M'); ?> <?= date('Y') ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-calendar"></i>
                </div>
                <a class="small-box-footer">Hari ini</a>
            </div>
        </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$jumlahuser?></h3>
                    <p>Total User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-email"></i>
                </div>
                <a class="small-box-footer">Sampai Saat Ini</a>
            </div>
        </div><!-- ./col -->
     
             <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $jumlahsuratkeluar ?></h3>
                    <p>Total Surat Keluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-box"></i>
                </div>
                <a href="<?= base_url('suratkeluar')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
     
             <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=$jumlaharsip?></h3>
                    <p>Total Arsip</p>
                </div>
                <div class="icon">
                    <i class="ion ion-email-unread"></i>
                </div>
                <a href="<?=base_url('managemenarsip')?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
         </div><!-- /.row -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Quote</h3>
            <!-- <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div> -->
        </div>
        <div class="box-body">
            Selamat datang user <strong><?= $this->fungsi->user_login()->nama ?></strong><br>
         “Jangan pernah menunda apa yang bisa dikerjakan hari ini untuk dikerjakan esok. Sebab jika Anda menyukainya hari ini, Anda bisa melakukannya lagi esok hari.”
         <h4>Download Manual Surat Digital <a href='https://suradi.malangkota.go.id/upload/Manual-Suradi.pdf' class='btn btn-info' target='_blank'><i class='fa fa-download'></i> Download</a> <a href='https://play.google.com/store/apps/details?id=go.id.malangkota.suradi&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Temukan di Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/id_badge_web_generic.png'/ width="140"></a></h4>
        </div><!-- /.box-body -->
        <div class="box-footer">
            – (Anonim)
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->