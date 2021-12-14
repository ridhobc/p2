<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelLkai */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LKAI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="p2-intel-lkai-view">

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
            'no_lkai',
            'tgl_lkai',
            'dok_sumber_lppi',
            'no_lppi_id',
           
            'dok_sumber_lpti',
            'no_lpti_id',
            
            'dok_sumber_npi',
            'no_npi',
            'tgl_npi',
            'ikhtisar_informasi_lkai:ntext',
            'prosedur_analisis_lkai:ntext',
            'hasil_analisis_lkai:ntext',
            'kesimpulan_lkai',
            'rekomendasi_lkai_id',
            'rekomendasi_lainnya_id',
            'rekomendasi_lainnya_ur:ntext',
            'informasi_lainnya_id',
            'informasi_lainnya_ur:ntext',
            'tujuan_lkai',
            'analis_lkai_nip',
            'keputusan_angsung_id',
            'keputusan_angsung_cat:ntext',
            'keputusan_angsung_tgl_terima',
            'keputusan_angsung_nip',
            'keputusan_atasan_angsung_id',
            'keputusan_atasan_angsung_cat:ntext',
            'keputusan_atasan_angsung_tgl_terima',
            'keputusan_atasan_angsung_nip',
        ],
    ]) ?>

</div>
