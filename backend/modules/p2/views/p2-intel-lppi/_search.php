<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLppiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-lppi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_kantor') ?>

    <?= $form->field($model, 'tgl_lppi') ?>

    <?= $form->field($model, 'kategori_lppi_id') ?>

    <?= $form->field($model, 'sumber_info_id') ?>

    <?php // echo $form->field($model, 'media') ?>

    <?php // echo $form->field($model, 'tgl_terima') ?>

    <?php // echo $form->field($model, 'no_dok') ?>

    <?php // echo $form->field($model, 'tgl_dok') ?>

    <?php // echo $form->field($model, 'penerima_info_id') ?>

    <?php // echo $form->field($model, 'penilai_info_id') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'disposisi_id') ?>

    <?php // echo $form->field($model, 'tgl_disposisi') ?>

    <?php // echo $form->field($model, 'tindak_lanjut_id') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'pejabat_id') ?>

    <?php // echo $form->field($model, 'status_pejabat') ?>

    <?php // echo $form->field($model, 'jabatan_ttd') ?>

    <?php // echo $form->field($model, 'no_lppi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
