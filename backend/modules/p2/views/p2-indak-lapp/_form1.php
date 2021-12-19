<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLapp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-indak-lapp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_lapp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lapp')->textInput() ?>

    <?= $form->field($model, 'li_id')->textInput() ?>

    <?= $form->field($model, 'ni_id')->textInput() ?>

    <?= $form->field($model, 'nhi_id')->textInput() ?>

    <?= $form->field($model, 'pelaku_cek')->textInput() ?>

    <?= $form->field($model, 'pelaku_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelanggaran_cek')->textInput() ?>

    <?= $form->field($model, 'pelanggaran_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locus_cek')->textInput() ?>

    <?= $form->field($model, 'locus_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempus_cek')->textInput() ?>

    <?= $form->field($model, 'tempus_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prosedural_cek')->textInput() ?>

    <?= $form->field($model, 'prosedural_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sdm_cek')->textInput() ?>

    <?= $form->field($model, 'sdm_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sarpras_cek')->textInput() ?>

    <?= $form->field($model, 'sarpras_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anggaran_cek')->textInput() ?>

    <?= $form->field($model, 'anggaran_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'layak_operasi_cek')->textInput() ?>

    <?= $form->field($model, 'mandiri_cek')->textInput() ?>

    <?= $form->field($model, 'mandiri_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dgn_bantuan_cek')->textInput() ?>

    <?= $form->field($model, 'dgn_bantuan_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelimpahan_cek')->textInput() ?>

    <?= $form->field($model, 'pelimpahan_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pelimpahan_bantuan_cek')->textInput() ?>

    <?= $form->field($model, 'pelimpahan_bantuan_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perbantuan_insta_lain_cek')->textInput() ?>

    <?= $form->field($model, 'perbantuan_insta_lain_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tidak_layak_operasi_cek')->textInput() ?>

    <?= $form->field($model, 'layak_patroli_cek')->textInput() ?>

    <?= $form->field($model, 'layak_patroli_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tidak_layak_patroli_cek')->textInput() ?>

    <?= $form->field($model, 'tidak_layak_patroli_keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesimpulan_lapp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'petugas_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pejabat_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
