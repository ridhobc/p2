<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelNiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-ni-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_ni') ?>

    <?= $form->field($model, 'tgl_ni') ?>

    <?= $form->field($model, 'sifat_ni') ?>

    <?php // echo $form->field($model, 'klasifikasi_ni') ?>

    <?php // echo $form->field($model, 'lkai_id') ?>

    <?php // echo $form->field($model, 'tujuan_kantor_ni') ?>

    <?php // echo $form->field($model, 'info_ni') ?>

    <?php // echo $form->field($model, 'pejabat_id') ?>

    <?php // echo $form->field($model, 'tembusan_ni') ?>

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
