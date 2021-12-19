<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakMpp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'P2 Indak Mpps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="p2-indak-mpp-view">

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
            'lapp_id',
            'ni_id',
            'nhi_id',
            'li_id',
            'det_mpp_nama',
            'det_mpp_umur',
            'det_mpp_jenkel',
            'det_mpp_alamat',
            'det_mpp_perusahan_terkait',
            'det_mpp_perusahan_alamat',
            'kategori_objek_id',
            'jenis_pelanggaran',
            'pasal_pelanggaran',
            'locus_mpp',
            'tempus_mpp',
            'modus_mpp',
            'komoditi_mpp',
            'jumlah_brg_mpp',
            'jenis_pengangkut_mpp',
            'no_voy_pol_mpp',
            'petikemas_kemasan_mpp',
            'ukuran_petikemas_mpp',
            'dokumen_terkait_mpp:ntext',
            'instruksi_mpp:ntext',
            'pejabat_id',
            'kd_kantor',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
