<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pegawai\models\DbKantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Db Kantors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-kantor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Db Kantor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_kantor',
            'nm_kantor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
