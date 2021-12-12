<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\widgets\ActiveForm;

$this->title = Yii::t('fees', 'AGENDA KEPALA KANTOR');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".disp-count{cursor:default;} .disp-count:hover {background-color:none !important}");
?>

<div class="row">

    <!---Start Inner Row For Paid/Unpaid Student--->
    <div class="col-sm-8">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-calendar"></i> <?php echo Yii::t('fees', 'HARI INI(SEDANG BERLANGSUNG)'); ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <table class="table table-responsive table-striped">
                    <thead >
                        <tr style="color: #0000cc">
                            <th><h2><?php echo Yii::t('app', 'No'); ?></h2></th>

                    <th><h2><?php echo Yii::t('app', 'Uraian'); ?></h2></th>
                    <th><h2><?php echo Yii::t('app', 'Tanggal'); ?></h2></th>
                    <th><h2><?php echo Yii::t('app', 'Waktu'); ?></h2></th>
                    <th><h2><?php echo Yii::t('app', 'Tempat'); ?></h2></th>
                    <th><h2><?php echo Yii::t('app', 'PIC'); ?></h2></th>
                    <th><h2><?php echo Yii::t('app', 'Keterangan'); ?></h2></th>


                    </tr>
                    </thead>
                    <tbody>
                        <?php if ($agendahariini) : ?>
                            <?php foreach ($agendahariini as $k => $v) : ?>
                                <tr>
                                    <td><h3><?= ($k + 1); ?></h3></td>
                                    <td><h3><?= $v['uraian_agenda']; ?></h3></td>
                                    <td><h3><?php echo Yii::$app->formatter->format($v['tgl_agenda'], 'date');  ; ?></h3></td>

                                    <td><h3><?= $v['waktu_agenda']; ?></h3></td>
                                    <td><h3><?= $v['tempat_agenda']; ?></h3></td>
                                    <td><h3><?= $v['pic_agenda']; ?></h3></td>
                                    <td><h3><?php
                                            if ($v['tgl_agenda'] == date('Y-m-d')) {
                                                echo "Hari ini";
                                            } else {
                                                echo "";
                                            }
                                            ?></h3></td>

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
    </div>
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-calendar"></i> <?php echo Yii::t('fees', 'AGENDA ALL'); ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
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
                   

                    </tr>
                    </thead>
                    <tbody>
                        <?php if ($agendaall) : ?>
                            <?php foreach ($agendaall as $k => $v) : ?>
                                <tr>
                                    <td><?= ($k + 1); ?></td>
                                    <td><?= $v['uraian_agenda']; ?></td>
                                    <td><?php echo Yii::$app->formatter->format($v['tgl_agenda'], 'date');  ; ?></td>

                                    <td><?= $v['waktu_agenda']; ?></td>
                                    <td><?= $v['tempat_agenda']; ?></td>
                                    <td><?= $v['pic_agenda']; ?></td>
                                    
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
    </div>
    <!---End Course Wise Total Student Block--->
</div>

<!---End First Row Student Branch Wise Total & Year Wise Admission--->


