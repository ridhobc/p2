<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    $(document).ready(function () {
        $('.tab-content').slimScroll({
            height: '300px'
        });
    });
    $(document).ready(function () {
        $('#coursList').slimScroll({
            height: '250px'
        });
    });
</script>
<!--<style>


    .fc-toolbar {
        padding: 5px;
        margin: 0;
    }
    h2, .h2 {
        font-size: 20px;
    }
    .fc-day-number {
        font-size: 11px;
        font-weight: 100;
        padding-right: 10px;
    }
    .fc-view-c
    .tab-content {
        padding:15px;
    }
    .box .box-body .fc-widget-header {
        background: none;
    }

    .fc-content {
        font-size: 13px;
        font-weight: bold;
        padding: 2px;
    }

    .closon {
        position: absolute;
        top: -2px;
        right: 0;
        cursor: pointer;
        background-color: #FFF
    }
    .popover{
        max-width:450px;   
    }
    .legend { list-style: none; }
    .legend li { float: left; margin-right: 10px; }
    .legend span { border: 1px solid #ccc; float: left; width: 12px; height: 12px; margin: 2px; }
    /* your colors */
    .legend .khusus { background-color: #00A65A; }
    .legend .umum { background-color: #00C0EF; }
    .legend .permintaan { background-color: #F39C12; }
    .legend .lainnya { background-color: #074979; }
</style>-->

<?php
yii\bootstrap\Modal::begin([
    'id' => 'eventModal',
    //'header' => "<div class='row'><div class='col-xs-6'><h3>Add Event</h3></div><div class='col-xs-6'>".Html::a('Delete', ['#'], ['class' => 'btn btn-danger pull-right', 'style' => 'margin-top:5px'])."</div></div>",
    'header' => "<h3>Tambah Ceramah</h3>",
]);

yii\bootstrap\Modal::end();
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
    'header' => '<h4><i class="fa fa-eye"></i> View Notice Details</h4>',
    'id' => 'NoticeModal',
]);
echo '<div id="NoticeModalContent"></div>';
yii\bootstrap\Modal::end();
?>

<div class="row">
    <div class="col-md-12">
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
            <div class="col-md-8">
                <section class="col-lg-12 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title"><?php echo Yii::t('app', 'Berita Kanwil Sulbagtara') ?></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <?=
                            yii\grid\GridView::widget([
                                'dataProvider' => $dataProvidernews,
                                'filterModel' => $searchModelnews,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'created_at',
                                        'format' => ['date', 'php:d M Y'],
                                        'filter' => kartik\widgets\DatePicker::widget([
                                            'model' => $searchModelnews,
                                            'attribute' => 'created_at',
                                            'options' => ['placeholder' => 'tanggal berita'],
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'todayHighlight' => true
                                            ]
                                        ])
                                    ],
                                    'judul_news',
                                    [
                                        'header' => 'View',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            return Html::a("<i class='fa fa-eye  '></i>", ['news/news/view', 'id' => $data->id]); // ubah ini                                 
                                        }
                                            ],
                                        ],
                                    ]);
                                    ?>
                                </div>

                            </div>
                        </section>
                        <section class="col-lg-12 connectedSortable">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <i class="fa fa-user"></i>
                                    <h3 class="box-title"><?php echo Yii::t('app', 'List Pejabat PLH') ?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?=
                                    yii\grid\GridView::widget([
                                        'dataProvider' => $dataProviderplh,
                                        'filterModel' => $searchModelplh,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            'no_sprint',
                                            ['attribute' => 'tgl_print',
                                                'format' => ['date', 'php:d M Y'],
                                                'filter' => kartik\widgets\DatePicker::widget([
                                                    'model' => $searchModelplh,
                                                    'attribute' => 'tgl_print',
                                                    'options' => ['placeholder' => 'tanggal Sprint'],
                                                    'pluginOptions' => [
                                                        'format' => 'yyyy-mm-dd',
                                                        'todayHighlight' => true
                                                    ]
                                                ])
                                            ],
                                            [
                                                'header' => 'Pejabat Pengganti',
                                                'value' => function ($data) {
                                                    return $data->pplh->spd_nama;
                                                }
                                            ],
                                            [
                                                'header' => 'Sebagai',
                                                'value' => function ($data) {
                                                    return $data->nama_jabatan_plh;
                                                }
                                            ],
                                            ['attribute' => 'tgl_mulai_plh',
                                                'format' => ['date', 'php:d M Y'],
                                                'filter' => kartik\widgets\DatePicker::widget([
                                                    'model' => $searchModelplh,
                                                    'attribute' => 'tgl_mulai_plh',
                                                    'options' => ['placeholder' => 'tanggal awal'],
                                                    'pluginOptions' => [
                                                        'format' => 'yyyy-mm-dd',
                                                        'todayHighlight' => true
                                                    ]
                                                ])
                                            ],
                                            ['attribute' => 'tgl_akhir_plh',
                                                'format' => ['date', 'php:d M Y'],
                                                'filter' => kartik\widgets\DatePicker::widget([
                                                    'model' => $searchModelplh,
                                                    'attribute' => 'tgl_akhir_plh',
                                                    'options' => ['placeholder' => 'tanggal awal'],
                                                    'pluginOptions' => [
                                                        'format' => 'yyyy-mm-dd',
                                                        'todayHighlight' => true
                                                    ]
                                                ])
                                            ],
                                        ],
                                    ]);
                                    ?>
                                </div>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <section class="col-lg-12 connectedSortable">
                                <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">

                                        <li class="active"><a href="#hariini" data-toggle="tab"><?php echo Yii::t('app', 'Hari ini') ?></a></li>
                                        <li class=""><a href="#kemaren" data-toggle="tab"><?php echo Yii::t('app', 'Kemaren') ?></a></li>
                                        <li class="pull-left header"><i class="fa fa-inbox"></i><?php echo Yii::t('app', 'Absen Anda') ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Notice -->
                                        <div class="tab-pane active" id="hariini">

                                           
                                        </div>

                                        <div class="tab-pane" id="kemaren">
                                            <?php
                                            $tanggal = date('Y-m-d');
                                            $day = date('D', strtotime($tanggal));
                                            $dayList = array(
                                                'Sun' => 'Minggu',
                                                'Mon' => 'Senin',
                                                'Tue' => 'Selasa',
                                                'Wed' => 'Rabu',
                                                'Thu' => 'Kamis',
                                                'Fri' => 'Jumat',
                                                'Sat' => 'Sabtu'
                                            );
                                            "Tanggal {$tanggal} adalah hari : " . $dayList[$day];
                                            if ($dayList[$day] == 'Senin') {
                                                $hariini = mktime(0, 0, 0, date("m"), date("d") - 3, date("Y"));
                                            } else {
                                                $hariini = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
                                            }
                                            $tglkemarenambil = date('Y-m-d', $hariini);

//                                            $absendatakemaren = \backend\modules\absen\models\AbsenData::find()
//                                                    ->where(['nip' => Yii::$app->user->identity->nip, 'tgl_absen' => $tglkemarenambil, 'checktime' => 'In'])
//                                                    ->groupBy(['nip'])
//                                                    ->orderBy('waktu_absen', 'DESC')
//                                                    ->one();
//                                            $absendatakemarenpul = \backend\modules\absen\models\AbsenData::find()
//                                                    ->where(['nip' => Yii::$app->user->identity->nip, 'tgl_absen' => $tglkemarenambil, 'checktime' => 'Out'])
//                                                    ->groupBy(['nip'])
//                                                    ->orderBy('waktu_absen', 'ASC')
//                                                    ->one();
                                            $absenkemaren = \backend\modules\absen\models\AbsenData::find()
                                                    ->where(['nip' => Yii::$app->user->identity->nip, 'tgl_absen' => $tglkemarenambil, 'checktime' => 'In'])
                                                    ->count();

                                            if ($absenkemaren == '0') {
                                                echo '<div class="box-header bg-warning"><div style="padding:5px">';
                                                echo Yii::t('app', 'Anda Belum Absen Pagi....');
                                                echo '</div></div>';
                                            } else {
                                                ?>
                                                <div class="notice-main bg-aqua">
                                                    <div class="notice-disp-date">
                                                        <small class="label label-success"><i class="fa fa-calendar"></i> <?php echo $absendatakemaren->tgl_absen ?></small>	
                                                    </div>
                                                    <div class="notice-body">
                                                        <div class="notice-title">History absen anda sebelumnya</div>
                                                        <div class="notice-desc">Masuk Pukul <?php echo Yii::$app->formatter->asTime($absendatakemaren->waktu_absen); ?> Pulang Pukul <?php echo Yii::$app->formatter->asTime($absendatakemarenpul->waktu_absen); ?></div>
                                                    </div>					          
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div> <!--  /.tab-content -->
                                </div><!-- /.nav-tabs-custom -->
                            </section><!-- /.Left col -->

                        </div>
                        <div class="row">
                            <section class="col-lg-12 connectedSortable">
                                <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">
                    <!--                    <li><a href="#emp-notice" data-toggle="tab"><?php echo Yii::t('app', 'Staf IP') ?></a></li>-->
                    <!--                    <li><a href="#stu-notice" data-toggle="tab"><?php echo Yii::t('app', 'Pegawai') ?></a></li>-->
                                        <li class="active"><a href="#all-notice" data-toggle="tab"><?php echo Yii::t('app', 'General') ?></a></li>
                                        <li class="pull-left header"><i class="fa fa-inbox"></i><?php echo Yii::t('app', 'Notice Board') ?></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Notice -->
                                        <div class="tab-pane active" id="all-notice">

                                            <?php
                                            $noticeList = backend\models\Notice::find()->where("is_status = 0 AND notice_user_type = '0'")->all();

                                            if (!empty($noticeList)) {
                                                foreach ($noticeList as $nl) :
                                                    ?>
                                                    <div class="notice-main bg-aqua">
                                                        <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
                                                        </div>
                                                        <div class="notice-body">
                                                            <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['dashboard/notice/view-popup', 'id' => $nl->notice_id])]); ?>&nbsp; </div>
                                                            <div class="notice-desc"><?= $nl->notice_description; ?> </div>
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
                                        <div class="tab-pane" id="stu-notice">

                                            <?php
                                            $noticeList = backend\models\Notice::find()->where("is_status = 0 AND notice_user_type = 'S'")->all();

                                            if (!empty($noticeList)) {
                                                foreach ($noticeList as $nl) :
                                                    ?>
                                                    <div class="notice-main bg-aqua">
                                                        <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
                                                        </div>
                                                        <div class="notice-body">
                                                            <div ><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['dashboard/notice/view-popup', 'id' => $nl->notice_id])]); ?>&nbsp; </div>
                                                            <div ><?= $nl->notice_description; ?> </div>
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
                                        <div class="tab-pane" id="emp-notice">

                                            <?php
                                            $noticeList = backend\models\Notice::find()->where("is_status = 0 AND notice_user_type = 'E'")->all();

                                            if (!empty($noticeList)) {
                                                foreach ($noticeList as $nl) :
                                                    ?>
                                                    <div class="notice-main bg-teal">
                                                        <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
                                                        </div>
                                                        <div class="notice-body">
                                                            <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['dashboard/notice/view-popup', 'id' => $nl->notice_id])]); ?>&nbsp; </div>
                                                            <div class="notice-desc"><?= $nl->notice_description; ?> </div>
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
                            </section><!-- /.Left col -->

                        </div>
                        <div class="row">
                            <section class="col-lg-12 connectedSortable">

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
                            </section><!-- right col -->
                        </div>
                        <div class="row">
                            <section class="col-lg-12 connectedSortable">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <i class="fa fa-calendar"></i>

                                        <h3 class="box-title"><?php echo Yii::t('app', 'Agenda Kepala Kantor (Hari ini)') ?></h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table class="table table-responsive table-striped">
                                            <thead >
                                                <tr style="color: #0000cc">
                                                    <th><?php echo Yii::t('app', 'No'); ?></th>

                                                    <th><?php echo Yii::t('app', 'Uraian'); ?></th>
                                                    <th><?php echo Yii::t('app', 'Tanggal'); ?></th>
                                                    <th><?php echo Yii::t('app', 'Waktu'); ?></th>
                                                    <th><?php echo Yii::t('app', 'Tempat'); ?></th>
                                                    <th><?php echo Yii::t('app', 'PIC'); ?></th>
                                                    <th><?php echo Yii::t('app', 'Keterangan'); ?></th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($agendahariini) : ?>
                                                    <?php foreach ($agendahariini as $k => $v) : ?>
                                                        <tr>
                                                            <td><?= ($k + 1); ?></td>
                                                            <td><?= $v['uraian_agenda']; ?></td>
                                                            <td><?php
                                        echo Yii::$app->formatter->format($v['tgl_agenda'], 'date');
                                        ;
                                                        ?></td>

                                                            <td><?= $v['waktu_agenda']; ?></td>
                                                            <td><?= $v['tempat_agenda']; ?></td>
                                                            <td><?= $v['pic_agenda']; ?></td>
                                                            <td><?php
                                                if ($v['tgl_agenda'] == date('Y-m-d')) {
                                                    echo "Hari ini";
                                                } else {
                                                    echo "";
                                                }
                                                        ?></td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="7" class="text-danger text-center"><?php echo Yii::t('app', 'No results found.'); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col-lg-12 connectedSortable">

                                <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">
                                        <li><a href="#diklat-upcoming" data-toggle="tab"><?php echo Yii::t('app', 'Upcoming') ?></a></li>
                                        <li class="active"><a href="#diklat-taday" data-toggle="tab"><?php echo Yii::t('app', "Sedang Diklat") ?></a></li>
                                        <li class="pull-left header"><?= Html::a("<i class='fa fa-leanpub '></i> List Diklat BPPK", ['spdstaftu/diklat/index'], ['class' => 'pull-left header']) ?> </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Birthdays -->
                                        <div class="tab-pane active" id="diklat-taday">
                                            <?php
                                            $diklatLi = "SELECT * FROM diklat_master WHERE (current_date() BETWEEN periode_diklat_awal AND periode_diklat_akhir) and tahun_diklat=" . date('Y') . "";
                                            $diklatList = backend\modules\spdstaftu\models\DiklatMaster::findBySql($diklatLi)->all();
                                            if (!empty($diklatList)) {
                                                foreach ($diklatList as $el) :
                                                    ?>
                                                    <div class="box box-solid bg-yellow ">
                                                        <div class="box-header">
                                                            <div class="pull-left" style="padding:5px">
                                                                <img src="<?= Yii::getAlias('@web') . "/user/" . (($el->user->photo)? : "no-photo.png"); ?>" class="img-circle" alt="noa image" width="40px" height="40px">
                                                            </div>
                                                            <h3 class="box-title"><?php echo $el->user->name; ?>&nbsp;
                                                                <small class="label label-success"><i class="fa fa-calendar"></i> <?php echo date('d M', strtotime($el->periode_diklat_awal)) . '-' . date('d M', strtotime($el->periode_diklat_akhir)); ?></small></h3>
                                                            <br/><h5 class="box-title "><?php echo $el->namadiklat->nama_diklat; ?></h5>
                                                            <br/><h5 class="box-title"><?php echo $el->penyelenggara->nm_peneyelenggara; ?></h5>
                                                        </div>
                                                    </div><!-- /.box -->
                                                    <?php
                                                endforeach;
                                            } else {
                                                echo '<div class="box-header bg-warning"><div style="padding:5px">';
                                                echo Yii::t('app', 'No Diklat Today');
                                                echo '</div></div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="tab-pane" id="diklat-upcoming">

                                            <?php
                                            $diklatLi = "SELECT * FROM  diklat_master WHERE  tahun_diklat=" . date('Y') . " and DATE_ADD(periode_diklat_awal, INTERVAL YEAR(CURDATE())-YEAR(periode_diklat_awal) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(periode_diklat_awal),1,0) YEAR) BETWEEN CURDATE()+1 AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) ORDER BY MONTH(periode_diklat_awal), DAY(periode_diklat_awal) ";
                                            $diklatList = backend\modules\spdstaftu\models\DiklatMaster::findBySql($diklatLi)->all();
                                            if (!empty($diklatList)) {
                                                foreach ($diklatList as $el) :
                                                    ?>
                                                    <div class="box box-solid bg-gray">
                                                        <div class="box-header">
                                                            <div class="pull-left" style="padding:5px">
                                                                <img src="<?= Yii::getAlias('@web') . "/user/" . (($el->user->photo)? : "no-photo.png"); ?>" class="img-circle" alt="noa image" width="40px" height="40px">
                                                            </div>
                                                            <h3 class="box-title"><?php echo $el->user->name; ?>&nbsp;
                                                                <small class="label label-success"><i class="fa fa-calendar"></i> <?php echo date('d M', strtotime($el->periode_diklat_awal)) . '-' . date('d M', strtotime($el->periode_diklat_akhir)); ?></small></h3>
                                                            <br/><h5 class="box-title "><?php echo $el->namadiklat->nama_diklat; ?></h5>
                                                            <br/><h5 class="box-title"><?php echo $el->penyelenggara->nm_peneyelenggara; ?></h5>
                                                        </div>
                                                    </div><!-- /.box -->
                                                    <?php
                                                endforeach;
                                            } else {
                                                echo '<div class="box-header bg-warning"><div style="padding:5px">';
                                                echo Yii::t('app', 'No Diklat within 30 days duration');
                                                echo '</div></div>';
                                            }
                                            ?>
                                </div>
                            </div> <!--  /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </section><!-- right col -->
                </div>

            </div>
        </div>
    </div>

</div>


