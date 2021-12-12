<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpiPetugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-stpi-petugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_intel_stpi') ?>

    <?= $form->field($model, 'nip_pegawai') ?>

    <?= $form->field($model, 'status_pegawai') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
