<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakSbp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-sbp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surat_perintah_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surat_perintah_tgl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_jenis_sarkut_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voy_penerbangan_trayek_sarkut_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uk_kap_muatan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nahkoda_pilot_sopir_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bendera_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_register_nopol_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_jenis_uk_nomor_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'petikemas_kemasan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_jenis_brg_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_no_tgl_dok_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pemilik_imp_eks_kuasa_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_bgn_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_reg_nppbkc_dll_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pemilik_menguasai_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_badan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir_badan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kewarganegaraan_badan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_badan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_identitas_badan_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi_indak_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ur_indak_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alasan_indak_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jen_pelanggaran_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tindakan_yang_diambil_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu_indak_mulai_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu_indak_selesai_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hal_yang_terjadi_sbp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
