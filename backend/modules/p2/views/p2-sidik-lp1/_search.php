<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLp1Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-sidik-lp1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'no_lp1') ?>

    <?= $form->field($model, 'tgl_lp1') ?>

    <?= $form->field($model, 'surat_pelimpahan_perkara_no') ?>

    <?php // echo $form->field($model, 'surat_pelimpahan_perkara_tgl') ?>

    <?php // echo $form->field($model, 'instansi_pelimpah') ?>

    <?php // echo $form->field($model, 'jenis_perkara') ?>

    <?php // echo $form->field($model, 'kategori_objek_id') ?>

    <?php // echo $form->field($model, 'locus_lp1') ?>

    <?php // echo $form->field($model, 'tempus_lp1') ?>

    <?php // echo $form->field($model, 'jam_lp1') ?>

    <?php // echo $form->field($model, 'nama_pelaku_lp1') ?>

    <?php // echo $form->field($model, 'umur_pelaku_lp1') ?>

    <?php // echo $form->field($model, 'jenkel_pelaku_lp1') ?>

    <?php // echo $form->field($model, 'alamat_pelaku_lp1') ?>

    <?php // echo $form->field($model, 'kel_komoditi_brg_lp1') ?>

    <?php // echo $form->field($model, 'jml_koli_brg_lp1') ?>

    <?php // echo $form->field($model, 'jenis_koli_brg_lp1') ?>

    <?php // echo $form->field($model, 'jenis_sarkut_lp1') ?>

    <?php // echo $form->field($model, 'voy_nopol_sarkut_lp1') ?>

    <?php // echo $form->field($model, 'nocont_sarkut_lp1') ?>

    <?php // echo $form->field($model, 'ukcont_sarkut_lp1') ?>

    <?php // echo $form->field($model, 'jen_pelanggaran_lp1') ?>

    <?php // echo $form->field($model, 'pasal_pelanggaran_lp1') ?>

    <?php // echo $form->field($model, 'modus_pelanggaran_lp1') ?>

    <?php // echo $form->field($model, 'lpp_id') ?>

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
