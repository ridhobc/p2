<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Setting');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'REFFERENSI'); ?></h3>
    </div>
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Propinsi'), ['propinsi/index']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pos\models\PosPropinsi::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['propinsi/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Kota'), ['propinsi-kota/index']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\modules\pos\models\PosPropinsiKota::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['propinsi-kota/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Tujuan Surat'), ['tujuan/index']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pos\models\PosTujuan::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['tujuan/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Status Surat'), ['status/index']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\modules\pos\models\PosStatusSrt::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['status/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
        </div> <!-- /. End Row-->
        

    </div><!-- /.box-body -->
    <div class="box-header with-border">
        <h3 class="box-title "><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'KIRIM POS'); ?></h3>
    </div>
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-truck"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Rekam Baru'), ['/pos-master/rekam']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pos\models\PosMaster::find()->where(['status_srt' => 2])->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New'), ['/user/create']); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
        </div> <!-- /. End Row-->


    </div><!-- /.box-body -->
    
    
</div>




<div class="pos-default-index">
    <h3>
        <p>
            Module untuk kiriman pos 
            <br/>1. Rekam Kiriman Pos
            <br/>2. Cetak Rekap Tanda terima Pos 
            <br/>3. Monitoring Kiriman Pos Secara Realtime
        </p>

    </h3>

</div>
