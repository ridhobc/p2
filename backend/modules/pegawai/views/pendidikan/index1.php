<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pegawai\models\DbPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Db Pendidikans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Db Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_pendidikan',
            'nm_pendidikan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
