<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2SidikLp1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Sidik Lp1s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-sidik-lp1-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Sidik Lp1', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_kantor',
            'no_lp1',
            'tgl_lp1',
            'surat_pelimpahan_perkara_no',
            //'surat_pelimpahan_perkara_tgl',
            //'instansi_pelimpah',
            //'jenis_perkara',
            //'kategori_objek_id',
            //'locus_lp1',
            //'tempus_lp1',
            //'jam_lp1',
            //'nama_pelaku_lp1',
            //'umur_pelaku_lp1',
            //'jenkel_pelaku_lp1',
            //'alamat_pelaku_lp1',
            //'kel_komoditi_brg_lp1',
            //'jml_koli_brg_lp1',
            //'jenis_koli_brg_lp1',
            //'jenis_sarkut_lp1',
            //'voy_nopol_sarkut_lp1',
            //'nocont_sarkut_lp1',
            //'ukcont_sarkut_lp1',
            //'jen_pelanggaran_lp1',
            //'pasal_pelanggaran_lp1',
            //'modus_pelanggaran_lp1',
            //'lpp_id',
            //'petugas_id',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
