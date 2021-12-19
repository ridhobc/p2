<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakMpp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-mpp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lapp_id')->textInput() ?>

    <?= $form->field($model, 'ni_id')->textInput() ?>

    <?= $form->field($model, 'nhi_id')->textInput() ?>

    <?= $form->field($model, 'li_id')->textInput() ?>

    <?= $form->field($model, 'det_mpp_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'det_mpp_umur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'det_mpp_jenkel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'det_mpp_alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'det_mpp_perusahan_terkait')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'det_mpp_perusahan_alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori_objek_id')->textInput() ?>

    <?= $form->field($model, 'jenis_pelanggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasal_pelanggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locus_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempus_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modus_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'komoditi_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_brg_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pengangkut_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_voy_pol_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'petikemas_kemasan_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ukuran_petikemas_mpp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dokumen_terkait_mpp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'instruksi_mpp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pejabat_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
