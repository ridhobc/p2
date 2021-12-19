<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLptpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-lptp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_sprint') ?>

    <?= $form->field($model, 'tgl_sprint') ?>

    <?= $form->field($model, 'kategori_objek_id') ?>

    <?php // echo $form->field($model, 'ur_penindakan') ?>

    <?php // echo $form->field($model, 'alasan_tidak_indak') ?>

    <?php // echo $form->field($model, 'catatan_lptp') ?>

    <?php // echo $form->field($model, 'sbp_id') ?>

    <?php // echo $form->field($model, 'petugas_id') ?>

    <?php // echo $form->field($model, 'atasan_petugas_id') ?>

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
