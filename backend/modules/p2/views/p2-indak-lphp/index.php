<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2IndakLphpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'P2 Indak Lphps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-indak-lphp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create P2 Indak Lphp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_kantor',
            'no_lphp',
            'tgl_lphp',
            'lptp_id',
            //'sbp_id',
            //'analisa_hasil_indak_lphp:ntext',
            //'catatan_lphp:ntext',
            //'petugas_id',
            //'atasan_petugas_id',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
