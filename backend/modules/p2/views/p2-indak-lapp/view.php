<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakLapp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'P2 Indak Lapps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="p2-indak-lapp-view">

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
            'no_lapp',
            'tgl_lapp',
            'li_id',
            'ni_id',
            'nhi_id',
            'pelaku_cek',
            'pelaku_keterangan',
            'pelanggaran_cek',
            'pelanggaran_keterangan',
            'locus_cek',
            'locus_keterangan',
            'tempus_cek',
            'tempus_keterangan',
            'prosedural_cek',
            'prosedural_keterangan',
            'sdm_cek',
            'sdm_keterangan',
            'sarpras_cek',
            'sarpras_keterangan',
            'anggaran_cek',
            'anggaran_keterangan',
            'layak_operasi_cek',
            'mandiri_cek',
            'mandiri_keterangan',
            'dgn_bantuan_cek',
            'dgn_bantuan_keterangan',
            'pelimpahan_cek',
            'pelimpahan_keterangan',
            'pelimpahan_bantuan_cek',
            'pelimpahan_bantuan_keterangan',
            'perbantuan_insta_lain_cek',
            'perbantuan_insta_lain_keterangan',
            'tidak_layak_operasi_cek',
            'layak_patroli_cek',
            'layak_patroli_keterangan',
            'tidak_layak_patroli_cek',
            'tidak_layak_patroli_keterangan',
            'kesimpulan_lapp:ntext',
            'petugas_id',
            'pejabat_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
