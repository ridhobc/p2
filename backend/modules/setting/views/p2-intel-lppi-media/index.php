<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\P2IntelLppiMediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Media LPPI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-lppi-media-index">

    <p>
        <?= Html::a('Rekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'nm_media',
            'kd_media',
            
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
