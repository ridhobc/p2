<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;
use kartik\dynagrid;
use yii\helpers\Url;
use kartik\money\MaskMoney;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 


    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'Laporan Pelaksanaan Tugas Intelijen'); ?></h3>         


<div  role="main">

    <div class="row">
        <div class="col-xs-6">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Surat Tugas Intelijen</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="col-xs-12">

                                <div class="row">
                                    <?=
                                    DetailView::widget([
                                        'model' => $modelstpi,
                                        'condensed' => true,
                                        'hover' => true,
                                        'bootstrap' => true,
                                        'bordered' => true,
                                        'responsive' => true,
                                        'mode' => DetailView::MODE_VIEW,
                                        'panel' => [
                                            'heading' => 'Surat Tugas  # ' . $modelstpi->tgl_rekam,
                                            'type' => DetailView::TYPE_INFO,
                                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'attributes' => [

                                            'no_stpi',
                                            [
                                                'attribute' => 'tgl_rekam',
                                                'format' => ['date', 'php:d M Y']
                                            ],
                                            'periode_penugasan',
                                            'uraian_tugas',
                                            'wilayah_penugasan',
                                            [
                                                'attribute' => 'pejabat_id',
                                                'value' => $modelstpi->pejabatttd->nm_pejabat,
                                            ],
                                        ],
                                    ])
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Petugas Intelijen</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="col-xs-12">


                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'nip_pegawai',
//                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]);
                                ?>



                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xs-6">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Laporan Pelaksanaan Tugas </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">

                                <div class="col-md-12">
                                    <?= $form->field($model, 'sumber_info')->textarea(['rows' => 6]) ?>
                                </div>

                            </div>
                            <div class="row">                                
                                <div class="col-md-12">
                                    <?= $form->field($model, 'metode_pengumpulan_info')->textarea(['rows' => 6]) ?>
                                </div>                                              
                            </div>
                            <div class="row">                                
                                <div class="col-md-12">
                                    <?= $form->field($model, 'ikhtisar_informasi')->textarea(['rows' => 6]) ?>                    
                                </div>                
                            </div>
                            <div class="row">                
                                <div class="col-md-4">
                                    <?= $form->field($model, 'jenis_dok_pbc')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'no_tgl_dok_pbc')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'metode_analisa_intelijen')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'ikhtisar_hasil')->textarea(['rows' => 6]) ?>                    
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'jenis_pelanggaran')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'modus_pelanggaran')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'perkiraan_tempat_pelanggaran')->textInput(['maxlength' => true]) ?>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <?= $form->field($model, 'perkiraan_waktu_pelanggaran')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'perkiraan_pelaku')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'info_lainnya')->textarea(['rows' => 6]) ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'lpti_simpulan')->textarea(['rows' => 6]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'lpti_rekom')->textarea(['rows' => 6]) ?>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>