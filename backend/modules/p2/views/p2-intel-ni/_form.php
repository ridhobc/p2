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
                <h2>Dasar NI</h2>
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
                    <div class="col-md-4">
                        <?php
                        $sifatni = [

                            '1' => 'Segera',
                            '2' => 'Sangat Segera'
                        ];
                        echo $form->field($model, 'sifat_ni')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $sifatni,
                            'options' => [
                                'placeholder' => 'Sifat NI',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>             
                    </div>
                    <div class="col-md-4">
                        <?php
                        $klasifikasini = [

                            '1' => 'Rahasia',
                            '2' => 'Sangat Rahasia'
                        ];
                        echo $form->field($model, 'klasifikasi_ni')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $klasifikasini,
                            'options' => [
                                'placeholder' => 'Klasifikasi NI',
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

                        <?= $form->field($model, 'tujuan_kantor_ni')->textInput(['maxlength' => true]) ?>
                    </div>                    
                </div>

                <div class="ln_solid"></div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Informasi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <div class="row">
                    <div class="col-md-12">                       
                        <?= $form->field($model, 'info_ni')->textarea(['rows' => 6]) ?>
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
                <div class="row">                   
                    <div class="col-md-12">
                        <?= $form->field($model, 'tembusan_ni')->textInput(['maxlength' => true]) ?>
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


