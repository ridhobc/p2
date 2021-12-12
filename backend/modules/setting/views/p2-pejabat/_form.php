<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2Pejabat */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pejabat Penandatangan </h2>
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
                    <?php
//= $form->field($model, 'training_id')->textInput()
                    $kodekantor = \yii\helpers\ArrayHelper::map(
                                    \backend\models\DbKantor::find()->all(), 'kd_kantor', 'nm_kantor');
                    echo $form->field($model, 'kd_kantor')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $kodekantor,
                        'options' => [
                            'placeholder' => 'Pilih Kantor...',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-4">
                   <?= $form->field($model, 'nm_pejabat')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                   <?= $form->field($model, 'nip_pejabat')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                   <?= $form->field($model, 'jab_pejabat')->textInput(['maxlength' => true]) ?>
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


