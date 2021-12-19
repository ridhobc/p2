<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2IndakMppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Indak Mpps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-mpp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Indak Mpp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lapp_id',
            'ni_id',
            'nhi_id',
            'li_id',
            //'det_mpp_nama',
            //'det_mpp_umur',
            //'det_mpp_jenkel',
            //'det_mpp_alamat',
            //'det_mpp_perusahan_terkait',
            //'det_mpp_perusahan_alamat',
            //'kategori_objek_id',
            //'jenis_pelanggaran',
            //'pasal_pelanggaran',
            //'locus_mpp',
            //'tempus_mpp',
            //'modus_mpp',
            //'komoditi_mpp',
            //'jumlah_brg_mpp',
            //'jenis_pengangkut_mpp',
            //'no_voy_pol_mpp',
            //'petikemas_kemasan_mpp',
            //'ukuran_petikemas_mpp',
            //'dokumen_terkait_mpp:ntext',
            //'instruksi_mpp:ntext',
            //'pejabat_id',
            //'kd_kantor',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
