<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiMasterNewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-pegawai-master-new-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'NipLama') ?>

    <?= $form->field($model, 'TmtEselon') ?>

    <?= $form->field($model, 'TmtCpns') ?>

    <?= $form->field($model, 'TmtPangkat') ?>

    <?php // echo $form->field($model, 'Nip') ?>

    <?php // echo $form->field($model, 'KdKantor') ?>

    <?php // echo $form->field($model, 'NmJenisJabatan') ?>

    <?php // echo $form->field($model, 'UraianJabatan') ?>

    <?php // echo $form->field($model, 'KdPangkat') ?>

    <?php // echo $form->field($model, 'MkGolTahun') ?>

    <?php // echo $form->field($model, 'MkGolBulan') ?>

    <?php // echo $form->field($model, 'KdJenisJabatan') ?>

    <?php // echo $form->field($model, 'NmPegawai') ?>

    <?php // echo $form->field($model, 'NmUnitOrganisasi') ?>

    <?php // echo $form->field($model, 'KdUnitOrganisasi') ?>

    <?php // echo $form->field($model, 'Peringkat') ?>

    <?php // echo $form->field($model, 'NmLembagaPendidikan') ?>

    <?php // echo $form->field($model, 'NmJenisAgama') ?>

    <?php // echo $form->field($model, 'UraianPangkat') ?>

    <?php // echo $form->field($model, 'NmJenisKelamin') ?>

    <?php // echo $form->field($model, 'UrlFoto') ?>

    <?php // echo $form->field($model, 'NmStatusPegawai') ?>

    <?php // echo $form->field($model, 'KdStatusPegawai') ?>

    <?php // echo $form->field($model, 'TglLahir') ?>

    <?php // echo $form->field($model, 'FlCuti') ?>

    <?php // echo $form->field($model, 'FlDiklat') ?>

    <?php // echo $form->field($model, 'FlHukuman') ?>

    <?php // echo $form->field($model, 'FlTugasBelajar') ?>

    <?php // echo $form->field($model, 'LokasiLahir') ?>

    <?php // echo $form->field($model, 'KdEselon') ?>

    <?php // echo $form->field($model, 'NmPendidikanAkhir') ?>

    <?php // echo $form->field($model, 'TmtJabatan') ?>

    <?php // echo $form->field($model, 'KdUnitOrganisasiInduk') ?>

    <?php // echo $form->field($model, 'NoNrp') ?>

    <?php // echo $form->field($model, 'NmJabatanGrade') ?>

    <?php // echo $form->field($model, 'NmPendidikanAwal') ?>

    <?php // echo $form->field($model, 'TglIjazahAwal') ?>

    <?php // echo $form->field($model, 'TglIjazahAkhir') ?>

    <?php // echo $form->field($model, 'GelarDepan') ?>

    <?php // echo $form->field($model, 'GelarBelakang') ?>

    <?php // echo $form->field($model, 'NmPegawaiSk') ?>

    <?php // echo $form->field($model, 'NoKarpeg') ?>

    <?php // echo $form->field($model, 'NPWP') ?>

    <?php // echo $form->field($model, 'KdPendidikanAkhir') ?>

    <?php // echo $form->field($model, 'KdPendidikanAwal') ?>

    <?php // echo $form->field($model, 'KdStatusPegawaiGroup') ?>

    <?php // echo $form->field($model, 'TmtPNS') ?>

    <?php // echo $form->field($model, 'Esl2') ?>

    <?php // echo $form->field($model, 'Esl3') ?>

    <?php // echo $form->field($model, 'Esl4') ?>

    <?php // echo $form->field($model, 'Esl5') ?>

    <?php // echo $form->field($model, 'NoIjazahAkhir') ?>

    <?php // echo $form->field($model, 'NoIjazahAwal') ?>

    <?php // echo $form->field($model, 'NoSkJabatan') ?>

    <?php // echo $form->field($model, 'NoSkPangkat') ?>

    <?php // echo $form->field($model, 'TglSkJabatan') ?>

    <?php // echo $form->field($model, 'TglSkPangkat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
