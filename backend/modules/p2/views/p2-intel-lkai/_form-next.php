<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-6 col-sm-6 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>LEMBAR KERJA ANALISIS INTELIJEN</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
         <h2>Silahkan Isikan Data Dokumen Sumber </h2>

            <?php $form = ActiveForm::begin(); ?>
            <?php if ($model->dok_sumber_lppi == '1') { ?>
                <div class="row">
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'dok_sumber_lppi')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                             'disabled' => true
                        ])->label(false);
                        ?>
                    </div>

                    <div class="col-md-8">
                        <?php
                        //= $form->field($model, 'training_id')->textInput()
                        $lppi = \yii\helpers\ArrayHelper::map(
                                        backend\modules\p2\models\P2IntelLppi::find()
                                                ->all(), 'id', 'no_lppi', 'tgl_lppi');
                        echo $form->field($model, 'no_lppi_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $lppi,
                            'options' => [
                                'placeholder' => 'Nomor LPPI',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>

                    </div>

                </div>
            <?php } ?>
            <?php if ($model->dok_sumber_lpti == '1') { ?>
                <div class="row">
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'dok_sumber_lpti')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                             'disabled' => true
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?php
                        //= $form->field($model, 'training_id')->textInput()
                        $lpti = \yii\helpers\ArrayHelper::map(
                                        backend\modules\p2\models\P2IntelLpti::find()
                                                ->all(), 'id', 'no_lpti', 'tgl_lpti');
                        echo $form->field($model, 'no_lpti_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $lpti,
                            'options' => [
                                'placeholder' => 'Nomor LPTI',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>

                    </div>

                </div>
            <?php } ?>
            <?php if ($model->dok_sumber_npi == '1') { ?>
            <div class="row">
                <div class="col-md-4">
                    <?=
                    $form->field($model, 'dok_sumber_npi')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'autoLabel' => true,
                         'disabled' => true
                    ])->label(false);
                    ?>
                </div>
                <div class="col-md-5">
                    <?= $form->field($model, 'no_npi')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?=
                    $form->field($model, 'tgl_npi')->widget(\kartik\widgets\DatePicker::className(), [
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
             <?php } ?>
            
            <div class="ln_solid"></div>
            <div class="item form-group">
                <?= Html::submitButton('Next', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

