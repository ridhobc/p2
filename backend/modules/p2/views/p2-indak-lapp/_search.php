<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLappSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-lapp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_lapp') ?>

    <?= $form->field($model, 'tgl_lapp') ?>

    <?= $form->field($model, 'li_id') ?>

    <?php // echo $form->field($model, 'ni_id') ?>

    <?php // echo $form->field($model, 'nhi_id') ?>

    <?php // echo $form->field($model, 'pelaku_cek') ?>

    <?php // echo $form->field($model, 'pelaku_keterangan') ?>

    <?php // echo $form->field($model, 'pelanggaran_cek') ?>

    <?php // echo $form->field($model, 'pelanggaran_keterangan') ?>

    <?php // echo $form->field($model, 'locus_cek') ?>

    <?php // echo $form->field($model, 'locus_keterangan') ?>

    <?php // echo $form->field($model, 'tempus_cek') ?>

    <?php // echo $form->field($model, 'tempus_keterangan') ?>

    <?php // echo $form->field($model, 'prosedural_cek') ?>

    <?php // echo $form->field($model, 'prosedural_keterangan') ?>

    <?php // echo $form->field($model, 'sdm_cek') ?>

    <?php // echo $form->field($model, 'sdm_keterangan') ?>

    <?php // echo $form->field($model, 'sarpras_cek') ?>

    <?php // echo $form->field($model, 'sarpras_keterangan') ?>

    <?php // echo $form->field($model, 'anggaran_cek') ?>

    <?php // echo $form->field($model, 'anggaran_keterangan') ?>

    <?php // echo $form->field($model, 'layak_operasi_cek') ?>

    <?php // echo $form->field($model, 'mandiri_cek') ?>

    <?php // echo $form->field($model, 'mandiri_keterangan') ?>

    <?php // echo $form->field($model, 'dgn_bantuan_cek') ?>

    <?php // echo $form->field($model, 'dgn_bantuan_keterangan') ?>

    <?php // echo $form->field($model, 'pelimpahan_cek') ?>

    <?php // echo $form->field($model, 'pelimpahan_keterangan') ?>

    <?php // echo $form->field($model, 'pelimpahan_bantuan_cek') ?>

    <?php // echo $form->field($model, 'pelimpahan_bantuan_keterangan') ?>

    <?php // echo $form->field($model, 'perbantuan_insta_lain_cek') ?>

    <?php // echo $form->field($model, 'perbantuan_insta_lain_keterangan') ?>

    <?php // echo $form->field($model, 'tidak_layak_operasi_cek') ?>

    <?php // echo $form->field($model, 'layak_patroli_cek') ?>

    <?php // echo $form->field($model, 'layak_patroli_keterangan') ?>

    <?php // echo $form->field($model, 'tidak_layak_patroli_cek') ?>

    <?php // echo $form->field($model, 'tidak_layak_patroli_keterangan') ?>

    <?php // echo $form->field($model, 'kesimpulan_lapp') ?>

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
