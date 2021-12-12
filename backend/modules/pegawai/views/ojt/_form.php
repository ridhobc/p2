<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiOjt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-pegawai-ojt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim_stan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ojt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip_ojt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
