<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dasar NHI</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-4">
                        <?php
                        $sifatnhi = [

                            '1' => 'Segera',
                            '2' => 'Sangat Segera'
                        ];
                        echo $form->field($model, 'sifat_nhi_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $sifatnhi,
                            'options' => [
                                'placeholder' => 'Sifat NHI',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>             
                    </div>
                    <div class="col-md-4">
                        <?php
                        $klasifikasinhi = [

                            '1' => 'Rahasia',
                            '2' => 'Sangat Rahasia'
                        ];
                        echo $form->field($model, 'klasifikasi_nhi_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $klasifikasinhi,
                            'options' => [
                                'placeholder' => 'Klasifikasi NHI',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>   
                    </div>
                    <div class="col-md-4">
                        <?php
                        $lkai = \yii\helpers\ArrayHelper::map(
                                        backend\modules\p2\models\P2IntelLkai::find()
                                                ->all(), 'id', 'no_lkai', 'tgl_lkai');
                        echo $form->field($model, 'lkai_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $lkai,
                            'options' => [
                                'placeholder' => 'Pilih LKAI',
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

                        <?= $form->field($model, 'kd_kantor_tujuan_nhi_id')->textInput(['maxlength' => true]) ?>
                    </div>                    
                </div>

                <div class="ln_solid"></div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Locus/Tempus</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="row">                

                    <div class="col-md-6">
                        <?= $form->field($model, 'tempat_info')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-6">
                        <?=
                        $form->field($model, 'tgl_info')->widget(\kartik\widgets\DatePicker::className(), [
                            'options' => ['placeholder' => 'Tgl Info..'],
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
                    <div class="col-md-12">
                        <?php
                        $kantorbcatensi = \yii\helpers\ArrayHelper::map(
                                        \backend\modules\setting\models\DbKantor::find()
                                                ->all(), 'kd_kantor', 'nm_kantor');
                        echo $form->field($model, 'kantor_bc_info_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $kantorbcatensi,
                            'options' => [
                                'placeholder' => 'Kantor BC Atensi',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>

                    </div>

                </div>


                <div class="ln_solid"></div>


            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail NHI</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <h3>Atas Kegiatan Barang Impor/Ekspor</h3>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'nm_no_dok_kepabeanan')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-5">
                        <?= $form->field($model, 'nm_sarkut_kepab')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'voy_nopol_sarkut_kepab')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_bl_awb')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_kontainer_merk_koli')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'nm_imp_eks_ppjk')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $form->field($model, 'jenis_jumlah_brg_kepab')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'data_lainnya_kepab')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                
                <h3>Atas Kegiatan Barang Kena Cukai</h3>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'nm_eks_pab_tpe')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-5">
                        <?= $form->field($model, 'nm_penyalur')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'nm_tpe')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_nppbkc')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $form->field($model, 'nm_sarkut_cukai')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'voy_nopol_sarkut_cukai')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'jenis_jumlah_brg_cukai')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $form->field($model, 'data_lainnya_cukai')->textInput(['maxlength' => true]) ?>
                    </div>                    
                </div>
                
                <h3>Atas Kegiatan Barang Tertentu</h3>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'nm_no_dok_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-5">
                        <?= $form->field($model, 'nm_sarkut_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'voy_nopol_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_bl_awb_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $form->field($model, 'no_kontainer_merk_koli_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'org_badan_hukum')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'jenis_jumlah_brg_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div> 
                    <div class="col-md-4">
                        <?= $form->field($model, 'data_lainnya_cukai_brg_tertentu')->textInput(['maxlength' => true]) ?>
                    </div>                    
                </div>
                
                 <h3>Indikasi</h3>
                <div class="row">
                    <div class="col-md-12">                       
                        <?= $form->field($model, 'indikasi_info')->textarea(['rows' => 6]) ?>
                    </div>                   
                    
                </div>
                 <div class="row">
                   
                    <div class="col-md-4">
                      <?php
                        $pejabat = \yii\helpers\ArrayHelper::map(
                                        \backend\modules\p2\models\P2Pejabat::find()
                                                ->all(), 'nip_pejabat', 'nm_pejabat');
                        echo $form->field($model, 'pejabat_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $pejabat,
                            'options' => [
                                'placeholder' => 'Pejabat TTD',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>
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

