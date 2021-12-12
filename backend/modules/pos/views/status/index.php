<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pos\models\PosStatusSrtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos Status Srts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-status-srt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pos Status Srt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nm_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
