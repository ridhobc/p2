<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2IntelLppiDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Intel Lppi Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lppi-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Intel Lppi Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lppi_id',
            'ikhtisar_info:ntext',
            'cek_sumber_id',
            'cek_validitas_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
