<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbKantor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-kantor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_kantor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Rekam' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-app bg-olive' : 'btn btn-app bg-orange']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
