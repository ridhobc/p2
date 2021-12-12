<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2IntelLkaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lembar Kerja Analisis Intelijen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lkai-index">

    <p>
        <?= Html::a('Rekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'no_lkai',
            'tgl_lkai',
            'dok_sumber_lppi',
            'no_lppi_id',
           
            'kesimpulan_lkai',
            'rekomendasi_lkai_id',
            
            //'rekomendasi_lainnya_ur:ntext',
            //'informasi_lainnya_id',
            //'informasi_lainnya_ur:ntext',
            //'tujuan_lkai',
            //'analis_lkai_nip',
            //'keputusan_angsung_id',
            //'keputusan_angsung_cat:ntext',
            //'keputusan_angsung_tgl_terima',
            //'keputusan_angsung_nip',
            //'keputusan_atasan_angsung_id',
            //'keputusan_atasan_angsung_cat:ntext',
            //'keputusan_atasan_angsung_tgl_terima',
            //'keputusan_atasan_angsung_nip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
