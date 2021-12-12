<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\P2IntelLppiKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori LPPI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lppi-kategori-index">

    <p>
        <?= Html::a('Rekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nm_kategori_lppi',
            'created_at',
            'created_by',
            'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
