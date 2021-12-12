<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pos-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_srt') ?>

    <?= $form->field($model, 'tgl_srt') ?>

    <?= $form->field($model, 'bidang_id') ?>

    <?= $form->field($model, 'tujuan_id') ?>

    <?php // echo $form->field($model, 'nip_ptgs_kirim') ?>

    <?php // echo $form->field($model, 'nip_ptgs_rt') ?>

    <?php // echo $form->field($model, 'status_srt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
