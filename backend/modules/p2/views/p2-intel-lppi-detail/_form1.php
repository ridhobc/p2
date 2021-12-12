<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLppiDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-lppi-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lppi_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ikhtisar_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cek_sumber_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cek_validitas_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
