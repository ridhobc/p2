<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pos\models\PosTujuanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pos-tujuan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nm_tujuan') ?>

    <?= $form->field($model, 'alamat_tujuan1') ?>

    <?= $form->field($model, 'alamat_tujuan2') ?>

    <?= $form->field($model, 'alamat_tujuan3') ?>

    <?php // echo $form->field($model, 'kota_tujuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
