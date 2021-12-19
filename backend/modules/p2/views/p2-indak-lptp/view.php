<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLptp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'P2 Indak Lptps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="p2-indak-lptp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kd_kantor',
            'no_sprint',
            'tgl_sprint',
            'kategori_objek_id',
            'ur_penindakan',
            'alasan_tidak_indak:ntext',
            'catatan_lptp:ntext',
            'sbp_id',
            'petugas_id',
            'atasan_petugas_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
