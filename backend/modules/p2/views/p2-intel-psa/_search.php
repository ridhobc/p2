<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelPsaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-psa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'atas_pelanggaran_psa') ?>

    <?= $form->field($model, 'oleh_pelanggaran_psa') ?>

    <?= $form->field($model, 'kronologi_psa') ?>

    <?php // echo $form->field($model, 'modus_psa') ?>

    <?php // echo $form->field($model, 'indikator_resiko_psa') ?>

    <?php // echo $form->field($model, 'pihak_terkait_psa') ?>

    <?php // echo $form->field($model, 'analisa_peraturan_psa') ?>

    <?php // echo $form->field($model, 'signifikansi_penindakan_psa') ?>

    <?php // echo $form->field($model, 'proses_penanganan_psa') ?>

    <?php // echo $form->field($model, 'kesimpulan_rekomendasi_psa') ?>

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
