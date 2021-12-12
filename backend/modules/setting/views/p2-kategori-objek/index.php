<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\P2KategoriObjekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Objek';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-kategori-objek-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Kategori Objek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'nm_kategori',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
