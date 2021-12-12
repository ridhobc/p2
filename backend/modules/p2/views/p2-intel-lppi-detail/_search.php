<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLppiDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-lppi-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lppi_id') ?>

    <?= $form->field($model, 'ikhtisar_info') ?>

    <?= $form->field($model, 'cek_sumber_id') ?>

    <?= $form->field($model, 'cek_validitas_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
