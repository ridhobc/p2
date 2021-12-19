<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLppSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-sidik-lpp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_lpp') ?>

    <?= $form->field($model, 'tgl_lpp') ?>

    <?= $form->field($model, 'no_lp_surat') ?>

    <?php // echo $form->field($model, 'tgl_lp_surat') ?>

    <?php // echo $form->field($model, 'sbp_id') ?>

    <?php // echo $form->field($model, 'catatan_atas_pembuat_lpp') ?>

    <?php // echo $form->field($model, 'petugas_id') ?>

    <?php // echo $form->field($model, 'atasan_petugas_id') ?>

    <?php // echo $form->field($model, 'angsung_atasan_petugas_id') ?>

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
