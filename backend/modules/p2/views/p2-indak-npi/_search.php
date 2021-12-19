<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakNpiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-npi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_npi') ?>

    <?= $form->field($model, 'tgl_npi') ?>

    <?= $form->field($model, 'ni_id') ?>

    <?php // echo $form->field($model, 'nhi_id') ?>

    <?php // echo $form->field($model, 'kategori_objek_id') ?>

    <?php // echo $form->field($model, 'info_npi') ?>

    <?php // echo $form->field($model, 'petugas_id') ?>

    <?php // echo $form->field($model, 'pejabat_id') ?>

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
