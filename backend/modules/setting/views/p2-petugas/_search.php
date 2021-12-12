<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2PetugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-petugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nip_petugas') ?>

    <?= $form->field($model, 'nm_petugas') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'pangkat_petugas') ?>

    <?php // echo $form->field($model, 'gol_petugas') ?>

    <?php // echo $form->field($model, 'jabatan_petugas') ?>

    <?php // echo $form->field($model, 'status_aktif') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
