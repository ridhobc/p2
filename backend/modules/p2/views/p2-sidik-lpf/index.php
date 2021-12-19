<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2SidikLpfSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Sidik Lpfs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-sidik-lpf-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Sidik Lpf', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_kantor',
            'no_lpf',
            'tgl_lpf',
            'sbp_id',
            //'kesimpulan_lpf',
            //'usulan_lpf',
            //'catatan_disposisi_atasan:ntext',
            //'petugas_id',
            //'atasan_petugas_id',
            //'angsung_atasan_id',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
