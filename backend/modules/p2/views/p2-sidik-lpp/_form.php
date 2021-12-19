<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLpp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-sidik-lpp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_lpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lpp')->textInput() ?>

    <?= $form->field($model, 'no_lp_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lp_surat')->textInput() ?>

    <?= $form->field($model, 'sbp_id')->textInput() ?>

    <?= $form->field($model, 'catatan_atas_pembuat_lpp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atasan_petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'angsung_atasan_petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
