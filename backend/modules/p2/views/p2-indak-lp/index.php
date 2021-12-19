<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2IndakLpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Indak Lps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-lp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Indak Lp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_kantor',
            'lphp_id',
            'sbp_id',
            'no_lp',
            //'tgl_lp',
            //'petugas_id',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
