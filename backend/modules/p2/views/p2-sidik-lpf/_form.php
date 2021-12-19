<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLpf */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-sidik-lpf-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_lpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lpf')->textInput() ?>

    <?= $form->field($model, 'sbp_id')->textInput() ?>

    <?= $form->field($model, 'kesimpulan_lpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usulan_lpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catatan_disposisi_atasan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atasan_petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'angsung_atasan_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
