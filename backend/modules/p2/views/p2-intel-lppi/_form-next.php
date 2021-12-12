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

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 
    
    
    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'Lembar Pengumpulan dan Penilaian Informasi'); ?></h3>         


<div  role="main">

    <div class="row">
        <div class="col-xs-6">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Sumber Pengumpulan Informasi </h2>
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
                                <?php $form = ActiveForm::begin(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
//= $form->field($model, 'training_id')->textInput()
                                        $kategori = \yii\helpers\ArrayHelper::map(
                                                        backend\modules\setting\models\P2IntelLppiKategori::find()
                                                                ->all(), 'id', 'nm_kategori_lppi');
                                        echo $form->field($model, 'kategori_lppi_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $kategori,
                                            'options' => [
                                                'placeholder' => 'Kategori LPPI',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $sumber = \yii\helpers\ArrayHelper::map(
                                                        backend\modules\setting\models\P2IntelLppiSumberinfo::find()
                                                                ->all(), 'id', 'nm_sumber');
                                        echo $form->field($model, 'sumber_info_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $sumber,
                                            'options' => [
                                                'placeholder' => 'Sumber Informasi',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="row">                
                                    <div class="col-md-6">
                                        <?php
//= $form->field($model, 'training_id')->textInput()
                                        $media = \yii\helpers\ArrayHelper::map(
                                                        backend\modules\setting\models\P2IntelLppiMedia::find()
                                                                ->all(), 'kd_media', 'nm_media');
                                        echo $form->field($model, 'media')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $media,
                                            'options' => [
                                                'placeholder' => 'Media LPPI',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>
                                        <?= $form->field($model, 'media')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?=
                                        $form->field($model, 'tgl_terima')->widget(\kartik\widgets\DatePicker::className(), [
                                            'options' => ['placeholder' => 'Tgl Terima..'],
                                            'language' => 'id',
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                                'todayBtn' => true,
                                            ]
                                        ])
                                        ?>

                                    </div>

                                </div>
                                <div class="row">                

                                    <div class="col-md-6">
                                        <?= $form->field($model, 'no_dok')->textInput(['maxlength' => true]) ?>
                                    </div> 
                                    <div class="col-md-6">
                                        <?=
                                        $form->field($model, 'tgl_dok')->widget(\kartik\widgets\DatePicker::className(), [
                                            'options' => ['placeholder' => 'Tgl Dokumen..'],
                                            'language' => 'id',
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                                'todayBtn' => true,
                                            ]
                                        ])
                                        ?>
                                    </div> 
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
                            <h2>Penilaian Informasi </h2>
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
                                    <div class="col-md-6">
                                        <?php
//= $form->field($model, 'training_id')->textInput()
                                        $penerima = \yii\helpers\ArrayHelper::map(
                                                        \backend\modules\setting\models\P2Petugas::find()
                                                                ->all(), 'nip_petugas', 'nm_petugas');
                                        echo $form->field($model, 'penerima_info_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $penerima,
                                            'options' => [
                                                'placeholder' => 'Penerima Info',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>

                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $penilai = \yii\helpers\ArrayHelper::map(
                                                        \backend\modules\setting\models\P2Petugas::find()
                                                                ->all(), 'nip_petugas', 'nm_petugas');
                                        echo $form->field($model, 'penilai_info_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $penilai,
                                            'options' => [
                                                'placeholder' => 'Penilai Info',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>
                                    </div>                
                                </div>
                                <div class="row">                
                                    <div class="col-md-12">
                                        <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>
                                    </div>
                                </div>
                                <div class="row">                
                                    <div class="col-md-6">
                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $disposisi = \yii\helpers\ArrayHelper::map(
                                                        \backend\modules\setting\models\P2Petugas::find()
                                                                ->all(), 'nip_petugas', 'nm_petugas');
                                        echo $form->field($model, 'disposisi_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $disposisi,
                                            'options' => [
                                                'placeholder' => 'Disposisi',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>                    
                                    </div>
                                    <div class="col-md-6">
                                        <?=
                                        $form->field($model, 'tgl_disposisi')->widget(\kartik\widgets\DatePicker::className(), [
                                            'options' => ['placeholder' => 'Tgl Disposisi..'],
                                            'language' => 'id',
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                                'todayBtn' => true,
                                            ]
                                        ])
                                        ?>

                                    </div>                
                                </div>
                                <div class="row">                
                                    <div class="col-md-4">
                                        <?php
//= $form->field($model, 'training_id')->textInput()

                                        $tindaklanjut = [

                                            'analis' => 'Analisa',
                                            'arsip' => 'Arsipkan'
                                        ];
                                        echo $form->field($model, 'tindak_lanjut_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $tindaklanjut,
                                            'options' => [
                                                'placeholder' => 'Tindak Lanjut',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>                    
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $pejabat = \yii\helpers\ArrayHelper::map(
                                                        \backend\modules\p2\models\P2Pejabat::find()
                                                                ->all(), 'nip_pejabat', 'nm_pejabat');
                                        echo $form->field($model, 'pejabat_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $pejabat,
                                            'options' => [
                                                'placeholder' => 'Tindak Lanjut',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>                    
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                        //= $form->field($model, 'training_id')->textInput()
                                        $plh = [

                                            '1' => 'Ya.',
                                            '0' => 'Tidak'
                                        ];
                                        echo $form->field($model, 'status_pejabat')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => $plh,
                                            'options' => [
                                                'placeholder' => 'Status Plh',
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]);
                                        ?>                    
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>
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

        <div class="col-xs-6">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Detailkan Informasi Yang Diterima</h2>
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
                                 
                                <?= Html::a('Rekam Detail', ['p2-intel-lppi-detail/create', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        
                                        'ikhtisar_info:ntext',
                                        'cek_sumber_id',
                                        'cek_validitas_id',
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]);
                                ?>
                               


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>