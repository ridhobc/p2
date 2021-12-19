<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2SidikLp1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-sidik-lp1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lp1')->textInput() ?>

    <?= $form->field($model, 'surat_pelimpahan_perkara_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surat_pelimpahan_perkara_tgl')->textInput() ?>

    <?= $form->field($model, 'instansi_pelimpah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_perkara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori_objek_id')->textInput() ?>

    <?= $form->field($model, 'locus_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempus_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jam_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pelaku_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'umur_pelaku_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenkel_pelaku_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pelaku_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kel_komoditi_brg_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jml_koli_brg_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_koli_brg_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_sarkut_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voy_nopol_sarkut_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nocont_sarkut_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ukcont_sarkut_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jen_pelanggaran_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasal_pelanggaran_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modus_pelanggaran_lp1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lpp_id')->textInput() ?>

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
