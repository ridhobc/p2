<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\p2\models\P2PejabatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pejabat Penanda Tangan' . $data->kantor->nm_kantor;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="p2-pejabat-index">


    <p>
        <?= Html::a('Tambah Pejabat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Nama Kantor',
                'value' => function ($data) {
                    return $data->kantor->nm_kantor;
                }
            ],
            'nip_petugas',
            'nm_petugas',          
            'pangkat_petugas',
                    'jabatan_petugas',
            [
                'format' => 'raw',
                'header' => 'Status',
                'value' => function ($data) {
                    if (\Yii::$app->user->identity->role == 'admin') {
                        if ($data->status_aktif == 0) {
                            return Html::a("Nonaktif", ['aktif', 'id' => $data->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [

                                            'confirm' => 'User diaktifkan?',
                                            'method' => 'post',
                                        ],
                            ]);
                        } else {
                            return Html::a("Aktif", ['nonaktif', 'id' => $data->id], [
                                        'class' => 'btn btn-info',
                                        'data' => [
                                            'confirm' => 'di non aktifkan?',
                                            'method' => 'post',
                                        ],
                            ]);
                        }
                    }
                },
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view}{update}',],
                ],
            ]);
            ?>


</div>
