<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLppi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LPPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lembar Pengumpulan dan Penilaian Informasi </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="  invoice-header">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <?= $form->field($model, 'no_lppi')->textInput(['maxlength' => true, 'placeholder' => 'Klik Tombol untuk Ambil NO LPPI', 'disabled' => true]) ?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($model, 'tgl_lppi')->textInput(['maxlength' => true, 'placeholder' => 'Tgl LPPI', 'disabled' => true]) ?>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-3">
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
                                        'disabled' => true
                                    ]);
                                    ?>
                                </div>
                                <div class="col-md-3">
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
                                        'disabled' => true
                                    ]);
                                    ?>
                                </div>

                            </div>
                            <div class="row">                
                                <div class="col-md-3">
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
                                        'disabled' => true
                                    ]);
                                    ?>
                                    
                                </div>
                                <div class="col-md-3">
                                    <?=
                                    $form->field($model, 'tgl_terima')->widget(\kartik\widgets\DatePicker::className(), [
                                        'options' => ['placeholder' => 'Tgl Terima..'],
                                        'language' => 'id',
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                            'todayHighlight' => true,
                                            'todayBtn' => true,
                                        ],
                                        'disabled' => true
                                    ])
                                    ?>

                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($model, 'no_dok')->textInput(['maxlength' => true, 'disabled' => true]) ?>
                                </div> 
                                <div class="col-md-3">
                                    <?=
                                    $form->field($model, 'tgl_dok')->widget(\kartik\widgets\DatePicker::className(), [
                                        'options' => ['placeholder' => 'Tgl Dokumen..'],
                                        'language' => 'id',
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                            'todayHighlight' => true,
                                            'todayBtn' => true,
                                        ],
                                        'disabled' => true
                                    ])
                                    ?>

                                </div> 
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <!--                                untuk pembatas form -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row">
                        <div class="  invoice-header">                            
                            <p class="lead">INFORMASI</p>
                        </div>
                    </div>                   
                    <div class="row">
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'ikhtisar_info:ntext',
                                'cek_sumber_id',
                                'cek_validitas_id',
//                                        ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]);
                        ?>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-md-6">
                            <p class="lead">PIHAK TERKAIT INFORMASI</p>
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

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <p class="lead">TINDAK LANJUT</p>
                            <div >
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
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>

                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <?php
                        $cekno1 = \backend\modules\p2\models\P2IntelLppiNosurat::find()
                                ->where(['lppi_id' => $model->id])
                                ->count();
                        ?>
                        <div class=" ">
                            <?= Html::submitButton('<i class="fa fa-fw fa-save"></i> Save', ['class' => 'btn btn-success']) ?>

                            <?php
                            if ($cekno1 > '0') {
                                echo Html::a('<i class="fa fa-fw fa-print"></i> Cetak', ['export-tandaterima', 'id' => $model->id], ['class' => 'btn btn-primary']);
                            } else {
                                echo Html::a('<i class="fa fa-fw fa-reload"></i> Ambil Nomor', ['ambil-no-lppi', 'id' => $model->id], ['class' => 'btn btn-danger']);
                            }
                            ?>

                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </section>
            </div>
        </div>
    </div>
</div>


