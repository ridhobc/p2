<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2SidikLppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Sidik Lpps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-sidik-lpp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Sidik Lpp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_kantor',
            'no_lpp',
            'tgl_lpp',
            'no_lp_surat',
            //'tgl_lp_surat',
            //'sbp_id',
            //'catatan_atas_pembuat_lpp:ntext',
            //'petugas_id',
            //'atasan_petugas_id',
            //'angsung_atasan_petugas_id',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
