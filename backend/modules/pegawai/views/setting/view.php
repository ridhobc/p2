<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\pegawai\models\DbPegawaiMasterNew */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Db Pegawai Master News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pegawai-master-new-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'NipLama',
            'TmtEselon',
            'TmtCpns',
            'TmtPangkat',
            'Nip',
            'KdKantor',
            'NmJenisJabatan',
            'UraianJabatan',
            'KdPangkat',
            'MkGolTahun',
            'MkGolBulan',
            'KdJenisJabatan',
            'NmPegawai',
            'NmUnitOrganisasi',
            'KdUnitOrganisasi',
            'Peringkat',
            'NmLembagaPendidikan',
            'NmJenisAgama',
            'UraianPangkat',
            'NmJenisKelamin',
            'UrlFoto:url',
            'NmStatusPegawai',
            'KdStatusPegawai',
            'TglLahir',
            'FlCuti',
            'FlDiklat',
            'FlHukuman',
            'FlTugasBelajar',
            'LokasiLahir',
            'KdEselon',
            'NmPendidikanAkhir',
            'TmtJabatan',
            'KdUnitOrganisasiInduk',
            'NoNrp',
            'NmJabatanGrade',
            'NmPendidikanAwal',
            'TglIjazahAwal',
            'TglIjazahAkhir',
            'GelarDepan',
            'GelarBelakang',
            'NmPegawaiSk',
            'NoKarpeg',
            'NPWP',
            'KdPendidikanAkhir',
            'KdPendidikanAwal',
            'KdStatusPegawaiGroup',
            'TmtPNS',
            'Esl2',
            'Esl3',
            'Esl4',
            'Esl5',
            'NoIjazahAkhir',
            'NoIjazahAwal',
            'NoSkJabatan',
            'NoSkPangkat',
            'TglSkJabatan',
            'TglSkPangkat',
        ],
    ]) ?>

</div>
