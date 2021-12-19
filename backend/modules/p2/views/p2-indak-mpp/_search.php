<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakMppSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-mpp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lapp_id') ?>

    <?= $form->field($model, 'ni_id') ?>

    <?= $form->field($model, 'nhi_id') ?>

    <?= $form->field($model, 'li_id') ?>

    <?php // echo $form->field($model, 'det_mpp_nama') ?>

    <?php // echo $form->field($model, 'det_mpp_umur') ?>

    <?php // echo $form->field($model, 'det_mpp_jenkel') ?>

    <?php // echo $form->field($model, 'det_mpp_alamat') ?>

    <?php // echo $form->field($model, 'det_mpp_perusahan_terkait') ?>

    <?php // echo $form->field($model, 'det_mpp_perusahan_alamat') ?>

    <?php // echo $form->field($model, 'kategori_objek_id') ?>

    <?php // echo $form->field($model, 'jenis_pelanggaran') ?>

    <?php // echo $form->field($model, 'pasal_pelanggaran') ?>

    <?php // echo $form->field($model, 'locus_mpp') ?>

    <?php // echo $form->field($model, 'tempus_mpp') ?>

    <?php // echo $form->field($model, 'modus_mpp') ?>

    <?php // echo $form->field($model, 'komoditi_mpp') ?>

    <?php // echo $form->field($model, 'jumlah_brg_mpp') ?>

    <?php // echo $form->field($model, 'jenis_pengangkut_mpp') ?>

    <?php // echo $form->field($model, 'no_voy_pol_mpp') ?>

    <?php // echo $form->field($model, 'petikemas_kemasan_mpp') ?>

    <?php // echo $form->field($model, 'ukuran_petikemas_mpp') ?>

    <?php // echo $form->field($model, 'dokumen_terkait_mpp') ?>

    <?php // echo $form->field($model, 'instruksi_mpp') ?>

    <?php // echo $form->field($model, 'pejabat_id') ?>

    <?php // echo $form->field($model, 'kd_kantor') ?>

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
