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
            <h2>Surat Tugas Intelijen </h2>
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
                    <?= $form->field($model, 'uraian_tugas')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?php
                    //= $form->field($model, 'training_id')->textInput()
                    $kategori = \yii\helpers\ArrayHelper::map(
                                    backend\modules\setting\models\P2KategoriPenugasan::find()->all(), 'id', 'nm_penugasan');
                    echo $form->field($model, 'kategori_tugas')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $kategori,
                        'options' => [
                            'placeholder' => 'Kategori Penugasan...',
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
                    <?= $form->field($model, 'periode_penugasan')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'wilayah_penugasan')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    //= $form->field($model, 'training_id')->textInput()
                    $pejabat = \yii\helpers\ArrayHelper::map(
                                    backend\modules\p2\models\P2Pejabat::find()->all(), 'id', 'nm_pejabat');
                    echo $form->field($model, 'pejabat_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $pejabat,
                        'options' => [
                            'placeholder' => 'Pilih Pejabat...',
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
                    $statusplh = [
                        '1' => 'Ya',
                        '0' => 'Tidak'
                    ];

                    echo $form->field($model, 'status_plh')->widget(\kartik\widgets\Select2::className(), [
                        'data' => $statusplh,
                        'options' => [
                            'placeholder' => 'Pilih Status',
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
                <?= Html::a('Add Pejabat', ['/setting/p2-pejabat'], ['class' => 'btn btn-primary']) ?> 
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

