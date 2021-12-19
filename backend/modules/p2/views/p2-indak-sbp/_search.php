<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakSbpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-sbp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'surat_perintah_no') ?>

    <?= $form->field($model, 'surat_perintah_tgl') ?>

    <?= $form->field($model, 'nm_jenis_sarkut_sbp') ?>

    <?= $form->field($model, 'voy_penerbangan_trayek_sarkut_sbp') ?>

    <?php // echo $form->field($model, 'uk_kap_muatan_sbp') ?>

    <?php // echo $form->field($model, 'nahkoda_pilot_sopir_sbp') ?>

    <?php // echo $form->field($model, 'bendera_sbp') ?>

    <?php // echo $form->field($model, 'no_register_nopol_sbp') ?>

    <?php // echo $form->field($model, 'jumlah_jenis_uk_nomor_sbp') ?>

    <?php // echo $form->field($model, 'petikemas_kemasan_sbp') ?>

    <?php // echo $form->field($model, 'jumlah_jenis_brg_sbp') ?>

    <?php // echo $form->field($model, 'jenis_no_tgl_dok_sbp') ?>

    <?php // echo $form->field($model, 'pemilik_imp_eks_kuasa_sbp') ?>

    <?php // echo $form->field($model, 'alamat_bgn_sbp') ?>

    <?php // echo $form->field($model, 'no_reg_nppbkc_dll_sbp') ?>

    <?php // echo $form->field($model, 'nm_pemilik_menguasai_sbp') ?>

    <?php // echo $form->field($model, 'nm_badan_sbp') ?>

    <?php // echo $form->field($model, 'tgl_lahir_badan_sbp') ?>

    <?php // echo $form->field($model, 'kewarganegaraan_badan_sbp') ?>

    <?php // echo $form->field($model, 'alamat_badan_sbp') ?>

    <?php // echo $form->field($model, 'no_identitas_badan_sbp') ?>

    <?php // echo $form->field($model, 'lokasi_indak_sbp') ?>

    <?php // echo $form->field($model, 'ur_indak_sbp') ?>

    <?php // echo $form->field($model, 'alasan_indak_sbp') ?>

    <?php // echo $form->field($model, 'jen_pelanggaran_sbp') ?>

    <?php // echo $form->field($model, 'tindakan_yang_diambil_id') ?>

    <?php // echo $form->field($model, 'waktu_indak_mulai_sbp') ?>

    <?php // echo $form->field($model, 'waktu_indak_selesai_sbp') ?>

    <?php // echo $form->field($model, 'hal_yang_terjadi_sbp') ?>

    <?php // echo $form->field($model, 'kd_kantor') ?>

    <?php // echo $form->field($model, 'petugas_id') ?>

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
