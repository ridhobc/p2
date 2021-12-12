<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\P2IntelCekSumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cek Sumber Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-intel-cek-sumber-index">

    <p>
        <?= Html::a('Rekam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'ur_cek_sumber',
            'kd_cek_sumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
