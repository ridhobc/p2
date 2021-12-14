<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2IntelLppiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lembar Pengumpulan dan Penilaian Informasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lppi-index">


    <p>
        <?= Html::a('Rekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute' => 'kd_kantor',
                'value' => function ($data) {
                    return $data->kantor->nm_kantor;
                }
            ],
            [
                'attribute' => 'kategori_lppi_id',
                'value' => function ($data) {
                    return $data->kategorilppi->nm_kategori_lppi;
                }
            ],
            [
                'attribute' => 'sumber_info_id',
                'value' => function ($data) {
                    return $data->sumberinfo->nm_sumber;
                }
            ],
           
            'media',
            'tgl_terima',
            'no_dok',
            'tgl_dok',
            'penerima_info_id',
            //'penilai_info_id',
            //'kesimpulan:ntext',
            //'disposisi_id',
            //'tgl_disposisi',
            //'tindak_lanjut_id',
            //'catatan:ntext',
            //'pejabat_id',
            //'status_pejabat',
            //'jabatan_ttd',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
