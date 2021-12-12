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
                <div class="col-md-12">                   
                    <?= $form->field($model, 'ikhtisar_info')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    //= $form->field($model, 'training_id')->textInput()
                    $sumber = \yii\helpers\ArrayHelper::map(
                                    backend\modules\setting\models\P2IntelCekSumber::find()
                                            ->all(), 'kd_cek_sumber', 'ur_cek_sumber');
                    echo $form->field($model, 'cek_sumber_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $sumber,
                        'options' => [
                            'placeholder' => 'Cek Sumber',
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
                    $valid = \yii\helpers\ArrayHelper::map(
                                    backend\modules\setting\models\P2IntelCekValid::find()
                                            ->all(), 'kd_cek_valid', 'ur_cek_valid');
                    echo $form->field($model, 'cek_validitas_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $valid,
                        'options' => [
                            'placeholder' => 'Validitas Informasi',
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

