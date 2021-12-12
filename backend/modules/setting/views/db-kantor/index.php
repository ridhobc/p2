<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\DbKantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Kantor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-kantor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Kantor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            'kd_kantor',
            'nm_kantor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
