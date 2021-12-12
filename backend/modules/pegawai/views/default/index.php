<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Setting Modul Pegawai');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'SETTING'); ?></h3>
    </div>
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Total Pegawai'), ['/setting/index']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\modules\pegawai\models\DbPegawaiMasterNew::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-home"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Kantor'), ['kantor/index']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbKantor::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Jenis Jabatan')); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbJenJab::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Agama')); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbAgama::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div> <!-- /. End Row-->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Eselon')); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbEselon::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Pangkat')); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbPangkat::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Status Pegawai')); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbStatusPegawai::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Pendidikan'), ['pendidikan/index']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbPendidikan::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
        </div> <!-- /. End Row-->

    </div><!-- /.box-body -->
</div>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'PROSES SEGERA'); ?></h3>
    </div>
    <div class="box-body">        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-red"><i class="fa fa-users"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'NAIK PANGKAT'), ['pangkat/naik-pangkat']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbViewNaikPangkat::find()->where(['between','selisih','0','180'])->count() ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-maroon"><i class="fa fa-users"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'CPNS Ke PNS'), ['pangkat/cpns-to-pns']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\modules\pegawai\models\DbPegawaiMasterNew::find()->where(['KdStatusPegawai'=>'100'])->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-maroon"><i class="fa fa-money"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'NAIK GAJI BERKALA'), ['kantor/index']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbKantor::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-black"><i class="fa fa-users"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'BAKAL PENSIUN')); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbJenJab::find()->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
        </div> <!-- /. End Row-->
        
    </div><!-- /.box-body -->
</div>

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'MONITORING'); ?></h3>
    </div>
    <div class="box-body">        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-green-active"><i class="fa fa-users"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'LAGI DIKLAT'), ['pegawai/lagi-diklat']); ?></span>
                        <span class="edusec-link-box-number"><?= \backend\modules\pegawai\models\DbViewNaikPangkat::find()->where(['FlDiklat'=>'Y'])->count() ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-green-gradient"><i class="fa fa-users"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'LAGI CUTI'), ['pegawai/lagi-cuti']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\modules\pegawai\models\DbPegawaiMasterNew::find()->where(['FlCuti'=>'Y'])->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="edusec-link-box">
                    <span class="edusec-link-box-icon bg-navy"><i class="fa fa-book"></i></span>
                    <div class="edusec-link-box-content">
                        <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'LAGI TUGAS BELAJAR'), ['pegawai/lagi-tugasbelajar']); ?></span>
                        <span class="edusec-link-box-number"><?= backend\modules\pegawai\models\DbPegawaiMasterNew::find()->where(['FlTugasBelajar'=>'Y'])->count(); ?></span>
                        <span class="edusec-link-box-desc"></span>
                        <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> ' . Yii::t('app', 'Create New')); ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
            
        </div> <!-- /. End Row-->
        
    </div><!-- /.box-body -->
</div>

