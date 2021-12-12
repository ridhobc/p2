<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'User Profil');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$empInfo = backend\models\User::findOne(@Yii::$app->user->identity->id);
$Photo = $empInfo->getPhoto($empInfo->photo);
$ProfileLink = ['/employee/emp-master/view', 'id' => $empInfo->id];
?>
<?php
$this->registerJs(
        "$(function() {
	$('.noticeModalLink').click(function() {
		$('#NoticeModal').modal('show')
		.find('#NoticeModalContent')
		.load($(this).attr('data-value'));
	});
});");

$this->registerJs(
        "$('body').on('click', function (e) {
    $('[data-toggle=\"popover\"]').each(function () {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide'); 
        }
    });
});"
)
?>

<?php
yii\bootstrap\Modal::begin([
    'header' => '<h4><i class="fa fa-eye"></i> Agenda Kepala Kantor</h4>',
    'id' => 'NoticeModal',
]);
echo '<div id="NoticeModalContent"></div>';
yii\bootstrap\Modal::end();
?>
<div class="row">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $stuMsg = backend\models\MsgOfDay::find()->where('is_status = 0  ')->one();
                if (!empty($stuMsg)) :
                    ?>
                    <div class="callout callout-info msg-of-day">

                        <h4><i class="fa fa-bullhorn"></i> <?php echo Yii::t('app', 'Message of day box') ?></h4>
                        <p><marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left"><?= $stuMsg->msg_details; ?></marquee></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $baru = \backend\modules\spmbcetak\models\SpmbSp::find()->where(['spmb_status_pesanan_id' => ['2', '3', '4', '5']])->count(); ?></h3>
                        <p>Total Permohonan ATK</p>
                    </div>
                    <div class="icon">
                        <i class=" fa fa-shopping-cart"></i>
                    </div>
                    <?= Html::a('<i class="fa fa-arrow-circle-right"></i> ' . Yii::t('app', 'More info'), ['spmbcetak/default/index'], ['class' => 'small-box-footer', 'title' => Yii::t('yii', 'terima')]); ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo \backend\modules\pos\models\PosMaster::find()->count(); ?></h3>

                        <p>Total Surat Terkirim</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <?= Html::a('<i class="fa fa-arrow-circle-right"></i> ' . Yii::t('app', 'More info'), ['pos/default/index'], ['class' => 'small-box-footer', 'title' => Yii::t('yii', 'terima')]); ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo \backend\modules\ruangan\models\RuangPinjam::find()->count(); ?></h3>

                        <p>Permintaan Ruangan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <?= Html::a('<i class="fa fa-arrow-circle-right"></i> ' . Yii::t('app', 'More info'), ['ruangan/default/index'], ['class' => 'small-box-footer', 'title' => Yii::t('yii', 'terima')]); ?>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
        </div>
        
        <div class="row">

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-body box-profile">

                                <img src="<?= $Photo ?>" class="profile-user-img img-responsive img-circle" alt="User Image"/>
                                <h3 class="profile-username text-center"><?php echo @Yii::$app->user->identity->name ?></h3>

                                <p class="text-muted text-center"><?php echo $profil->Nip ?></p>
                                <div class="box-body">
<!--                                    <strong><i class="fa fa-map-marker margin-r-5"></i> Tempat Tgl Lahir</strong>

                                    <p class="text-muted"><?php echo $profil->LokasiLahir ?>, <?php echo $profil->TglLahir ?></p>

                                    <hr>-->
                                    <strong><i class="fa fa-book margin-r-5"></i> Jabatan</strong>

                                    <p class="text-muted">
                                        <?php echo $profil->UraianJabatan ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fa fa-paper-plane-o"></i> Pangkat</strong>

                                    <p class="text-muted">
                                        <?php echo $profil->UraianPangkat ?>
                                    </p>

                                    <hr>
                                    <strong><i class="fa fa-star-half-empty"></i> Tgl Naik Pangkat</strong>

                                    <p class="text-muted">
                                        <?php echo $profil->tgl_pangkat_berikutnya ?>
                                    </p>

                                    <hr>


                                    <strong><i class="fa  fa-tags"></i> NPWP</strong>

                                    <p class="text-muted">
                                        <?php echo $profil->NPWP ?>
                                    </p>

                                    <hr>

                                    <strong><i class="fa fa-gear"></i> Level Role App</strong>
                                    <p>
                                        <span class="label label-danger"><?php echo @Yii::$app->user->identity->role ?></span>                                
                                    </p>                            
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li><a href="#birth-upcoming" data-toggle="tab"><?php echo Yii::t('app', 'Upcoming') ?></a></li>
                                <li class="active"><a href="#birth-taday" data-toggle="tab"><?php echo Yii::t('app', "Today's") ?></a></li>
                                <li class="pull-left header"><i class="fa fa-birthday-cake"></i><?php echo Yii::t('app', 'Birthdays') ?></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Birthdays -->
                                <div class="tab-pane active" id="birth-taday">
                                    <?php
                                    $empList = backend\models\User::find()->where(["LIKE", "birthday", date('m-d')])->orderBy('birthday ASC')->all();
                                    if (!empty($empList)) {
                                        foreach ($empList as $el) :
                                            ?>
                                            <div class="box box-solid bg-aqua">
                                                <div class="box-header">
                                                    <div class="pull-left" style="padding:5px">

                                                        <img src="<?= Yii::getAlias('@web') . "/user/" . (($el->photo)? : "no-photo.png"); ?>" class="img-circle" alt="noa image" width="40px" height="40px">
                                                    </div>
                                                    <h3 class="box-title"><?php echo $el->name; ?>&nbsp;
                                                        <small class="label label-success"><i class="fa fa-calendar"></i> <?php echo date('d M', strtotime($el->birthday)); ?></small></h3>
                                                </div>
                                            </div><!-- /.box -->
                                            <?php
                                        endforeach;
                                    } else {
                                        echo '<div class="box-header bg-warning"><div style="padding:5px">';
                                        echo Yii::t('app', 'No Birthday Today');
                                        echo '</div></div>';
                                    }
                                    ?>
                                </div>
                                <div class="tab-pane" id="birth-upcoming">
                                    <?php
                                    $empLi = "SELECT * FROM  user WHERE  DATE_ADD(birthday, INTERVAL YEAR(CURDATE())-YEAR(birthday) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(birthday),1,0) YEAR) BETWEEN CURDATE()+1 AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) ORDER BY MONTH(birthday), DAY(birthday) ";
                                    $empList = backend\models\User::findBySql($empLi)->all();
                                    if (!empty($empList)) {
                                        foreach ($empList as $el) :
                                            ?>
                                            <div class="box box-solid bg-aqua">
                                                <div class="box-header">
                                                    <div class="pull-left" style="padding:5px">
                                                        <img src="<?= Yii::getAlias('@web') . "/user/" . (($el->photo)? : "no-photo.png"); ?>" class="img-circle" alt="noa image" width="40px" height="40px">
                                                    </div>
                                                    <h3 class="box-title"><?php echo $el->name; ?>&nbsp;
                                                        <small class="label label-warning"><i class="fa fa-calendar"></i> <?php echo date('d M', strtotime($el->birthday)); ?></small></h3>
                                                </div>
                                            </div><!-- /.box -->
                                            <?php
                                        endforeach;
                                    } else {
                                        echo '<div class="box-header bg-warning"><div style="padding:5px">';
                                        echo Yii::t('app', 'No Birthday within 30 days duration');
                                        echo '</div></div>';
                                    }
                                    ?>
                                </div>
                            </div> <!--  /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->

                    </div>
                    <div class="col-md-12">
                        <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#all-notice" data-toggle="tab"><?php echo Yii::t('app', 'Hari Ini') ?></a></li>
                                <li class="pull-left header"><i class="fa fa-book"></i><?php echo Yii::t('app', 'Agenda Kakanwil') ?></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Notice -->
                                <div class="tab-pane active" id="all-notice">

                                    <?php
                                    $agendaLi = "SELECT * FROM tab_agenda WHERE (current_date() BETWEEN tgl_mulai AND tgl_selesai) ";
                                    $agendaList = \backend\modules\agendakanwil\models\AgendaKanwil::findBySql($agendaLi)->all();
                                    if (!empty($agendaList)) {
                                        foreach ($agendaList as $el => $k) :
                                            ?>
                                            <div class="notice-main bg-aqua">
                                                <div class="notice-disp-date">
                                                    <small class="label label-success"><i class="fa fa-calendar"></i>                                                        
                                                        <?= (!empty($k->tgl_mulai) ? Yii::$app->formatter->asDate($k->tgl_mulai) : "Not Set"); ?>
                                                    </small>	
                                                </div>
                                                <div class="notice-body">
                                                    <div class="notice-title"><?= Html::a($k->tempat_agenda, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['agendakanwil/agenda-kanwil/view-popup', 'id' => $k->id])]); ?>&nbsp; </div>
                                                    <div class="notice-desc"><?= $k->uraian_agenda; ?> </div>
                                                </div>					          
                                            </div>
                                            <?php
                                        endforeach;
                                    } else {
                                        echo '<div class="box-header bg-warning"><div style="padding:5px">';
                                        echo Yii::t('app', 'No Notice....');
                                        echo '</div></div>';
                                    }
                                    ?>
                                </div>

                            </div> <!--  /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </div>

                </div>

            </div>
            <div class="col-md-8">
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#berita" data-toggle="tab">Berita</a></li>
                        <li><a href="#absen" data-toggle="tab">Absen</a></li>
                        <li><a href="#diklat" data-toggle="tab">Diklat</a></li>
                        <li><a href="#plh" data-toggle="tab">Plh</a></li>
                        <li><a href="#event" data-toggle="tab">Event</a></li>
                        <li><a href="#atk" data-toggle="tab">ATK</a></li>
                        <li><a href="#pos" data-toggle="tab">POS</a></li>

                        <li class="pull-left header"><i class="fa fa-life-ring"></i> Info Sulbagtara</li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="berita">
                            <div class="box-header with-border">
                                <i class="fa fa-home"></i>
                                <h3 class="box-title"><?php echo Html::a("Index", ['news/news/index']); ?></h3>
                            </div>
                            <!-- Post -->                            
                            <?php
                            foreach (backend\modules\news\models\NewsMaster::find()->orderBy(['id' => SORT_DESC])->limit(5)->all() as $berita) {
                                ?>
                                <div class="post">

                                    <?php
                                    $empInfonews = backend\models\User::findOne($berita->created_by);
                                    $Photonews = $empInfonews->getPhoto($empInfonews->photo);
                                    ?>
                                    <div class="box-header bg-info">

                                        <div style="padding:5px">
                                            <div class="user-block">
                                                <img src="<?= $Photonews; ?>" class="img-circle img-bordered-sm" alt="User Image"/>
                                                <span class="username">
                                                    <a href="#"><?= $berita->user->name; ?></a>
                                                    <a href="#" class="pull-right btn-box-tool"><?= $berita->type->nm_type; ?></a>
                                                </span>
                                                <span class="description"><?php echo Yii::$app->formatter->asDateTime($berita->created_at); ?> </span>
                                                <p>
                                                    <?= $berita->judul_news; ?>
                                                    <?php echo Html::a("selengkapnya...", ['news/news/view', 'id' => $berita->id]); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <?php } ?>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="diklat">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-header with-border">
                                    <i class="fa fa-warning"></i>
                                    <h3 class="box-title">Diklat yang anda ikuti tahun ini</h3>
                                </div>
                                <table class="table table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Diklat</th>
                                        <th>Tgl Diklat</th>
                                        <th>Selesai</th>
                                        <th>Penyelenggara</th>
                                    </tr>
                                    <?php if ($diklat) : ?>
                                        <?php foreach ($diklat as $k => $v) : ?>
                                            <tr>
                                                <td><?php echo $k + 1 ?></td>
                                                <td><?php echo $v->namadiklat->nama_diklat ?></td>
                                                <td><span class="label label-success"><?php echo $v->periode_diklat_awal ?></span></td>
                                                <td><span class="label label-danger"><?php echo $v->periode_diklat_akhir ?></span></td>
                                                <td><?php echo $v->penyelenggara->nm_peneyelenggara ?>  </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-danger text-center"><?php echo Yii::t('app', 'Tidak ada diklat tahunan yang diikuti'); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                </table>
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="plh">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-header with-border">
                                    <i class="fa fa-warning"></i>
                                    <h3 class="box-title">Plh Pejabat Hari ini</h3>
                                </div>
                                <table class="table table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>No PLH</th>
                                        <th>Pejabat Pengganti</th>
                                        <th>Sebagai</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Akhir</th>
                                    </tr>
                                    <?php
                                    $plhLi = "SELECT * FROM spd_plh WHERE (current_date() BETWEEN tgl_mulai_plh AND tgl_akhir_plh) ";
                                    $plhList = backend\modules\spdstaftu\models\SpdPlh::findBySql($plhLi)->all();
                                    if (!empty($plhList)) {
                                        foreach ($plhList as $el => $k) :
                                            ?>
                                            <tr>
                                                <td><?= ($el + 1); ?></td>
                                                <td><?= $k->no_sprint; ?></td>
                                                <td><?= $k->pplh->spd_nama; ?></td>

                                                <td><?= $k->nama_jabatan_plh; ?></td>
                                                <td><?= $k->tgl_mulai_plh; ?></td>
                                                <td><?= $k->tgl_akhir_plh; ?></td>

                                            </tr>
                                            <?php
                                        endforeach;
                                    } else {
                                        echo "<tr>
                                            <td colspan='5' class='text-danger text-center'>Tidak ada Plh  untuk tanggal ini</td>
                                        </tr>";
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="atk">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-header with-border">
                                    
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <i class="ion ion-forward"></i>
                                            <h3 class="box-title"><?php echo Yii::t('app', 'List 10 Permintaan ' . Yii::$app->user->identity->unit->nm_unit) ?></h3>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="box-body no-padding">                                    
                                                <div class="table-responsive">
                                                    <!-- .table - Uses sparkline charts-->
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th></th>
                                                            <th>Permintaan</th>
                                                            <th>Total Item</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                        <?php
                                                        $spList = backend\modules\spmbcetak\models\SpmbSp::find()
                                                                        ->Where(
                                                                                ['kd_bidang' => Yii::$app->user->identity->unit_id]
                                                                        )
                                                                        ->limit(10)
                                                                        ->orderBy([
                                                                            'id' => SORT_DESC //urut nomor terakhir ke nomor awal
                                                                        ])->all();
                                                        foreach ($spList as $cl) :
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </td>
                                                                <td><?php echo $cl->smpb_sp_nomor; ?>(<?php echo $cl->smpb_sp_tgl; ?>)</td>
                                                                <td><div id="sparkline-1"><?php
                                                                        echo $count = \backend\modules\spmbcetak\models\SpmbSpDetail::find()
                                                                        ->where([
                                                                            'smpb_sp_id' => $cl->id,
                                                                        ])
                                                                        ->count();
                                                                        ?> Item</div></td>
                                                                <td><?php echo $cl->spmbStatusPesanan->spmb_status_nama; ?></td>
                                                                <td><?php echo $cl->alasan_penolakan; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table><!-- /.table -->
                                                </div>
                                            </div><!-- /.box-body-->

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="event">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-header with-border">
                                    <div class="box box-danger">
                            <div class="box-header with-border">
                                <i class="ion ion-forward"></i>
                                <h3 class="box-title"><?php echo Yii::t('app', 'Booking List 3 Hari Kedepan ') ?></h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="box-body no-padding">                                    
                                    <div class="table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                        <table class="table table-striped">
                                            <tr>
                                                <th></th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Ruangan</th>
                                                <th>Acara</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>


                                                <th></th>
                                            </tr>
                                            <?php
                                            $empLi = "SELECT * FROM  ruang_pinjam WHERE  DATE_ADD(tgl_pinjam, INTERVAL YEAR(CURDATE())-YEAR(tgl_pinjam) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(tgl_pinjam),1,0) YEAR) BETWEEN CURDATE()+1 AND DATE_ADD(CURDATE(), INTERVAL 3 DAY) and status_id='3'";
                                            $empList = \backend\modules\ruangan\models\RuangPinjam::findBySql($empLi)->all();
                                            ?>
                                            <?php if ($empList) : ?>

                                                <?php foreach ($empList as $a => $b) : ?>
                                                    <tr>
                                                        <td>
                                                            <i class="fa fa-ellipsis-v"></i>
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </td>
                                                        <td><?php echo date('d F Y', strtotime($b->tgl_pinjam)); ?></td>
                                                        <td><?php echo $b->jam_awal; ?></td>
                                                        <td><?php echo $b->lokasi->nm_ged; ?></td>
                                                        <td><?php echo $b->perihal; ?></td>
                                                        <td><?php echo $b->deskripsi; ?></td>
                                                        <td><?php echo $b->mohon->nama_status; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr><td colspan="7"><?php echo Yii::t('app', 'Tidak ada Bookingan hari ini'); ?></td></tr>

                                            <?php endif; ?>



                                        </table><!-- /.table -->
                                    </div>
                                </div><!-- /.box-body-->

                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="absen">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-header with-border">
                                    <i class="fa fa-warning"></i>
                                    <h3 class="box-title">Absen Anda</h3>
                                </div>
                                <div class="col-md-12">
                                    <!-- The time line -->
                                    <?php
                                    $tglharini = date('Y-m-d');
                                    $dataabsen = \backend\modules\absen\models\AbsenMaster::find()
                                            ->where(['tgl_absen' => $tglharini, 'nip' => @Yii::$app->user->identity->nip])
                                            ->one();

                                    if ($dataabsen->status_absen_id == "N") {
                                        $masuk = $dataabsen->jam_masuk_time;
                                        $pulang = $dataabsen->jam_pulang_time;
//                                         $masuk = "$dataabsen->status_absen_id";
//                                        $pulang = "$dataabsen->status_absen_id";
                                    } else {
                                        $masuk = "";
                                        $pulang = "";
                                    }
                                    ?>
                                    <?php if ($dataabsen->status_absen_id == "N") { ?>
                                        <ul class="timeline">                                      
                                            <li class="time-label">
                                                <span class="bg-red">
                                                    <?php echo $tglharini; ?>
                                                </span>
                                            </li>                                        
                                            <li>
                                                <i class="fa fa-sign-in bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $masuk ?></span>                                               
                                                    <h3 class="timeline-header"><a href="#">Masuk</a> </h3>                                               
                                                </div>
                                            </li>
                                            <li>
                                                <i class="fa fa-sign-out bg-red"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $pulang; ?></span>
                                                    <h3 class="timeline-header no-border"><a href="#">Pulang</a> </h3>
                                                </div>
                                            </li>                                       
                                            <li>
                                                <i class="fa fa-clock-o bg-gray"></i>
                                            </li>
                                        </ul>
                                    <?php } else if ($dataabsen->status_absen_id == "DL") { ?>
                                    <ul class="timeline">                                      
                                            <li class="time-label">
                                                <span class="bg-red">
                                                    <?php echo $tglharini; ?>
                                                </span>
                                            </li>                                        
                                            <li>
                                                <i class="fa fa-sign-in bg-green"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> Dinas Luar</span>                                               
                                                    <h3 class="timeline-header"><a href="#">Masuk</a> </h3>                                               
                                                </div>
                                            </li>
                                            <li>
                                                <i class="fa fa-sign-out bg-red"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> Dinas Luar</span>
                                                    <h3 class="timeline-header no-border"><a href="#">Pulang</a> </h3>
                                                </div>
                                            </li>                                       
                                            <li>
                                                <i class="fa fa-clock-o bg-gray"></i>
                                            </li>
                                        </ul>
                                        <?php
                                    } else {
                                        echo
                                        "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Peringatan</h4>
                Anda belum absen
              </div>";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="pos">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-header with-border">
                                    <i class="fa fa-warning"></i>
                                    <h3 class="box-title">Pengiriman Pos</h3>
                                </div>
                                <div class="col-md-12">
                                  <table class="table table-striped">
                                    <tr>
                                        <th></th>
                                        <th>Surat</th>
                                        <th>Tujuan</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $spListadmin = \backend\modules\pos\models\PosMaster::find()
                                              ->Where(
                                                            ['bidang_id' => Yii::$app->user->identity->unit_id]
                                                    )
                                                    ->limit(10)
                                                    ->orderBy([
                                                        'id' => SORT_DESC //urut nomor terakhir ke nomor awal
                                                    ])->all();
                                    foreach ($spListadmin as $cla) :
                                        ?>
                                        <tr>
                                            <td>
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </td>
                                            <td><?php echo $cla->no_srt; ?>(<?php echo $cla->kotatujuan->name; ?>)</td>

                                            <td><?php echo $cla->tujuanunit->nm_tujuan; ?></td>
                                            <td><?php echo $cla->status->nm_status; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table><!-- /.table -->
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>



