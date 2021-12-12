<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pos\models\PosPropinsiKotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos Propinsi Kotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-propinsi-kota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pos Propinsi Kota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'propinsi_id',
            'name',
            'type',
            'postal_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
