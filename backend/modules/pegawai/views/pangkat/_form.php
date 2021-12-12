<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\Pangkat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pangkat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'NipLama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TmtEselon')->textInput() ?>

    <?= $form->field($model, 'TmtCpns')->textInput() ?>

    <?= $form->field($model, 'TmtPangkat')->textInput() ?>

    <?= $form->field($model, 'Nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdKantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmJenisJabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UraianJabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdPangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MkGolTahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MkGolBulan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdJenisJabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmPegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmUnitOrganisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdUnitOrganisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Peringkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmLembagaPendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmJenisAgama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UraianPangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmJenisKelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UrlFoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmStatusPegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdStatusPegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TglLahir')->textInput() ?>

    <?= $form->field($model, 'FlCuti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FlDiklat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FlHukuman')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FlTugasBelajar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LokasiLahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdEselon')->textInput() ?>

    <?= $form->field($model, 'NmPendidikanAkhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TmtJabatan')->textInput() ?>

    <?= $form->field($model, 'KdUnitOrganisasiInduk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoNrp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmJabatanGrade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmPendidikanAwal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TglIjazahAwal')->textInput() ?>

    <?= $form->field($model, 'TglIjazahAkhir')->textInput() ?>

    <?= $form->field($model, 'GelarDepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GelarBelakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NmPegawaiSk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoKarpeg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NPWP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdPendidikanAkhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdPendidikanAwal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KdStatusPegawaiGroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TmtPNS')->textInput() ?>

    <?= $form->field($model, 'Esl2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Esl3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Esl4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Esl5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoIjazahAkhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoIjazahAwal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoSkJabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoSkPangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TglSkJabatan')->textInput() ?>

    <?= $form->field($model, 'TglSkPangkat')->textInput() ?>

    <?= $form->field($model, 'umur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendidikan_id')->textInput() ?>

    <?= $form->field($model, 'tgl_pangkat_berikutnya')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
