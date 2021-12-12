<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPendidikan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-pendidikan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pendidikan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
