<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2PejabatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-pejabat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nm_pejabat') ?>

    <?= $form->field($model, 'nip_pejabat') ?>

    <?= $form->field($model, 'jab_pejabat') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
