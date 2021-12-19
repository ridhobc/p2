<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelNhiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-nhi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_nhi') ?>

    <?= $form->field($model, 'tgl_nhi') ?>

    <?= $form->field($model, 'sifat_nhi_id') ?>

    <?php // echo $form->field($model, 'klasifikasi_nhi_id') ?>

    <?php // echo $form->field($model, 'lkai_id') ?>

    <?php // echo $form->field($model, 'kd_kantor_tujuan_nhi_id') ?>

    <?php // echo $form->field($model, 'tempat_info') ?>

    <?php // echo $form->field($model, 'tgl_info') ?>

    <?php // echo $form->field($model, 'kantor_bc_info_id') ?>

    <?php // echo $form->field($model, 'kepabenanan_info_chek') ?>

    <?php // echo $form->field($model, 'nm_no_dok_kepabeanan') ?>

    <?php // echo $form->field($model, 'nm_sarkut_kepab') ?>

    <?php // echo $form->field($model, 'voy_nopol_sarkut_kepab') ?>

    <?php // echo $form->field($model, 'no_bl_awb') ?>

    <?php // echo $form->field($model, 'no_kontainer_merk_koli') ?>

    <?php // echo $form->field($model, 'nm_imp_eks_ppjk') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'jenis_jumlah_brg_kepab') ?>

    <?php // echo $form->field($model, 'data_lainnya_kepab') ?>

    <?php // echo $form->field($model, 'cukai_info_cek') ?>

    <?php // echo $form->field($model, 'nm_eks_pab_tpe') ?>

    <?php // echo $form->field($model, 'nm_penyalur') ?>

    <?php // echo $form->field($model, 'nm_tpe') ?>

    <?php // echo $form->field($model, 'no_nppbkc') ?>

    <?php // echo $form->field($model, 'nm_sarkut_cukai') ?>

    <?php // echo $form->field($model, 'voy_nopol_sarkut_cukai') ?>

    <?php // echo $form->field($model, 'jenis_jumlah_brg_cukai') ?>

    <?php // echo $form->field($model, 'data_lainnya_cukai') ?>

    <?php // echo $form->field($model, 'barang_tertentu_cek') ?>

    <?php // echo $form->field($model, 'nm_no_dok_brg_tertentu') ?>

    <?php // echo $form->field($model, 'nm_sarkut_brg_tertentu') ?>

    <?php // echo $form->field($model, 'voy_nopol_brg_tertentu') ?>

    <?php // echo $form->field($model, 'no_bl_awb_brg_tertentu') ?>

    <?php // echo $form->field($model, 'no_kontainer_merk_koli_brg_tertentu') ?>

    <?php // echo $form->field($model, 'org_badan_hukum') ?>

    <?php // echo $form->field($model, 'jenis_jumlah_brg_brg_tertentu') ?>

    <?php // echo $form->field($model, 'data_lainnya_cukai_brg_tertentu') ?>

    <?php // echo $form->field($model, 'indikasi_info') ?>

    <?php // echo $form->field($model, 'pejabat_id') ?>

    <?php // echo $form->field($model, 'tembusan_kantor') ?>

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
