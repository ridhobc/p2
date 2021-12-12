<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\pegawai\models\DbPegawaiOjtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Db Pegawai Ojts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-pegawai-ojt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Db Pegawai Ojt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nim_stan',
            'nama_ojt',
            'nip_ojt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
