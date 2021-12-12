<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\DbPegawaiMasterNewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Db Pegawai Master News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pegawai-master-new-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Db Pegawai Master New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'NipLama',
            'TmtEselon',
            'TmtCpns',
            'TmtPangkat',
            //'Nip',
            //'KdKantor',
            //'NmJenisJabatan',
            //'UraianJabatan',
            //'KdPangkat',
            //'MkGolTahun',
            //'MkGolBulan',
            //'KdJenisJabatan',
            //'NmPegawai',
            //'NmUnitOrganisasi',
            //'KdUnitOrganisasi',
            //'Peringkat',
            //'NmLembagaPendidikan',
            //'NmJenisAgama',
            //'UraianPangkat',
            //'NmJenisKelamin',
            //'UrlFoto',
            //'NmStatusPegawai',
            //'KdStatusPegawai',
            //'TglLahir',
            //'FlCuti',
            //'FlDiklat',
            //'FlHukuman',
            //'FlTugasBelajar',
            //'LokasiLahir',
            //'KdEselon',
            //'NmPendidikanAkhir',
            //'TmtJabatan',
            //'KdUnitOrganisasiInduk',
            //'NoNrp',
            //'NmJabatanGrade',
            //'NmPendidikanAwal',
            //'TglIjazahAwal',
            //'TglIjazahAkhir',
            //'GelarDepan',
            //'GelarBelakang',
            //'NmPegawaiSk',
            //'NoKarpeg',
            //'NPWP',
            //'KdPendidikanAkhir',
            //'KdPendidikanAwal',
            //'KdStatusPegawaiGroup',
            //'TmtPNS',
            //'Esl2',
            //'Esl3',
            //'Esl4',
            //'Esl5',
            //'NoIjazahAkhir',
            //'NoIjazahAwal',
            //'NoSkJabatan',
            //'NoSkPangkat',
            //'TglSkJabatan',
            //'TglSkPangkat',
            //'umur',
            //'pendidikan_id',
            //'tgl_pangkat_berikutnya',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
