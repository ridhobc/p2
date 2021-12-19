<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-lp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lphp_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sbp_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_lp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lp')->textInput() ?>

    <?= $form->field($model, 'petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
