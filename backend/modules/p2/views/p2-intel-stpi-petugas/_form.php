<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpiPetugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-stpi-petugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_intel_stpi')->textInput() ?>

    <?= $form->field($model, 'nip_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
