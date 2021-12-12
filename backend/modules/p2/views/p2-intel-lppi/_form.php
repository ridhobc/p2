<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>LPPI</h2>
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
                <div class="col-md-3">
                    <?php
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
                        ]
                    ])
                    ?>

                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'no_dok')->textInput(['maxlength' => true]) ?>
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
                        ]
                    ])
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

