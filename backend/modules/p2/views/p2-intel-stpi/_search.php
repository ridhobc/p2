<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-stpi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'tgl_rekam') ?>

    <?= $form->field($model, 'uraian_tugas') ?>

    <?= $form->field($model, 'kategori_tugas') ?>

    <?php // echo $form->field($model, 'periode_penugasan') ?>

    <?php // echo $form->field($model, 'wilayah_penugasan') ?>

    <?php // echo $form->field($model, 'pejabat_id') ?>

    <?php // echo $form->field($model, 'status_plh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
