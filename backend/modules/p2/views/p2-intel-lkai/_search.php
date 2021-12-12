<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLkaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-intel-lkai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_lkai') ?>

    <?= $form->field($model, 'tgl_lkai') ?>

    <?= $form->field($model, 'dok_sumber_lppi') ?>

    <?= $form->field($model, 'no_lppi') ?>

    <?php // echo $form->field($model, 'tgl_lppi') ?>

    <?php // echo $form->field($model, 'dok_sumber_lpti') ?>

    <?php // echo $form->field($model, 'no_lpti') ?>

    <?php // echo $form->field($model, 'tgl_lpti') ?>

    <?php // echo $form->field($model, 'dok_sumber_npi') ?>

    <?php // echo $form->field($model, 'no_npi') ?>

    <?php // echo $form->field($model, 'tgl_npi') ?>

    <?php // echo $form->field($model, 'ikhtisar_informasi_lkai') ?>

    <?php // echo $form->field($model, 'prosedur_analisis_lkai') ?>

    <?php // echo $form->field($model, 'hasil_analisis_lkai') ?>

    <?php // echo $form->field($model, 'kesimpulan_lkai') ?>

    <?php // echo $form->field($model, 'rekomendasi_lkai_id') ?>

    <?php // echo $form->field($model, 'rekomendasi_lainnya_id') ?>

    <?php // echo $form->field($model, 'rekomendasi_lainnya_ur') ?>

    <?php // echo $form->field($model, 'informasi_lainnya_id') ?>

    <?php // echo $form->field($model, 'informasi_lainnya_ur') ?>

    <?php // echo $form->field($model, 'tujuan_lkai') ?>

    <?php // echo $form->field($model, 'analis_lkai_nip') ?>

    <?php // echo $form->field($model, 'keputusan_angsung_id') ?>

    <?php // echo $form->field($model, 'keputusan_angsung_cat') ?>

    <?php // echo $form->field($model, 'keputusan_angsung_tgl_terima') ?>

    <?php // echo $form->field($model, 'keputusan_angsung_nip') ?>

    <?php // echo $form->field($model, 'keputusan_atasan_angsung_id') ?>

    <?php // echo $form->field($model, 'keputusan_atasan_angsung_cat') ?>

    <?php // echo $form->field($model, 'keputusan_atasan_angsung_tgl_terima') ?>

    <?php // echo $form->field($model, 'keputusan_atasan_angsung_nip') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
