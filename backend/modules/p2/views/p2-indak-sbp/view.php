<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IndakSbp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'P2 Indak Sbps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="p2-indak-sbp-view">

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
            'surat_perintah_no',
            'surat_perintah_tgl',
            'nm_jenis_sarkut_sbp',
            'voy_penerbangan_trayek_sarkut_sbp',
            'uk_kap_muatan_sbp',
            'nahkoda_pilot_sopir_sbp',
            'bendera_sbp',
            'no_register_nopol_sbp',
            'jumlah_jenis_uk_nomor_sbp',
            'petikemas_kemasan_sbp',
            'jumlah_jenis_brg_sbp',
            'jenis_no_tgl_dok_sbp',
            'pemilik_imp_eks_kuasa_sbp',
            'alamat_bgn_sbp',
            'no_reg_nppbkc_dll_sbp',
            'nm_pemilik_menguasai_sbp',
            'nm_badan_sbp',
            'tgl_lahir_badan_sbp',
            'kewarganegaraan_badan_sbp',
            'alamat_badan_sbp',
            'no_identitas_badan_sbp',
            'lokasi_indak_sbp',
            'ur_indak_sbp',
            'alasan_indak_sbp',
            'jen_pelanggaran_sbp',
            'tindakan_yang_diambil_id',
            'waktu_indak_mulai_sbp',
            'waktu_indak_selesai_sbp',
            'hal_yang_terjadi_sbp',
            'kd_kantor',
            'petugas_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
