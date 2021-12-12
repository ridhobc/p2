<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\P2IntelCekValidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cek Valid';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-cek-valid-index">

    <p>
        <?= Html::a('Rekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ur_cek_valid',
            'kd_cek_valid',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
