<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\spmbcetak\models\SpmbSp */

$this->title = 'Nomor Surat ' . $model->no_srt . ' tgl  ' . $model->tgl_srt;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spmb-sp-view">

    <p>
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-primary', 'title' => 'Home']) ?>
        <?php
        if ($model->status_srt == '1' || $model->status_srt == '2') {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        ?>

        <?php
        if ($model->status_srt == '1') {
            echo Html::a('Kirim', ['prokirim', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }
        ?>
        <?php
        if ($model->status_srt == '1') {
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>


    </p>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-eye "></i> <?php echo Yii::t('app', 'Detail Pengiriman Surat'); ?></h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-xs6 col-lg-6">
                    <div class="row">
                        <div class="box box-solid box-primary col-xs-6 col-lg-6 no-padding">
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Detail Surat'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            [
                                                'attribute' => 'bidang_id',
                                                'value' => $model->bidang->nm_bidang,
                                            ],
                                            'no_srt',
                                            'tgl_srt',
                                            [
                                                'attribute' => 'tujuan_id',
                                                'value' => $model->tujuanunit->nm_tujuan,
                                            ],
                                            'nip_ptgs_kirim',
                                            [
                                                'attribute' => 'status_srt',
                                                'value' => $model->status->nm_status,
                                            ],
                                        ],
                                    ])
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                        <div class="box box-solid box-danger col-xs-6 col-lg-6 no-padding">
                        
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Detail Kirim'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                   <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            [
                                                'attribute' => 'nip_ptgs_kirim',
                                                'value' => $model->ptgkirim->name,
                                            ],
                                            'no_telp_pic',
                                            [
                                                'attribute' => 'kota_tujuan',
                                                'value' => $model->kotatujuan->name,
                                            ],
                                            [
                                                'attribute' => 'kota_asal',
                                                'value' => $model->kotaasal->name,
                                            ],
                                            'berat_satuan',
                                            'courir',
                                            'jen_service',
                                            'type_kirim',
                                            'harga_kirim_satuan_rp',
                                            'etd',
                                            'ket',
                                        ],
                                    ])
                                    ?>
                                    <?php
                                    if (Yii::$app->user->can('level-admin') || Yii::$app->user->can('level-staftu')) {
                                        echo Html::a('Cek Estimasi Biaya', ['cek-ongkir-bid', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="col-xs-6 col-lg-6">
                    <div class="box box-solid box-warning col-xs-6 col-lg-6 no-padding">
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Konfirmasi JNE'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'no_resi',
                                            'tgl_resi',
                                            'penerima',
                                            'tgl_selesai',
                                            'ket',
                                        ],
                                    ])
                                    ?>
                                    <?php
                                    if (Yii::$app->user->can('level-admin') || Yii::$app->user->can('level-staftu')) {
                                        if ($model->no_resi == '') {
                                            echo Html::a('Input Resi', ['resi', 'id' => $model->id], ['class' => 'btn btn-success']);
                                        } else {
                                            echo Html::a('Cek Update Terkirim', ['cek-terkirim-bid', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                        }
                                    }
                                  
                                    ?>
                                    
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-hover">                                        
                                        <?php
                                        $data = json_decode($response, true);
                                        if ($data['rajaongkir']['status']['code'] == '200') {
                                            if ($data) {
//                                            

                                                for ($i = 2; $i < count($data['rajaongkir']); $i++) {
                                                    ?> 
                                                    <tr>
                                                        <td>Resi</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['waybill_number']; ?> / <?= $data['rajaongkir']['result']['summary']['waybill_date']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Asal</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['shipper_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota Asal</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['origin']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tujuan</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['receiver_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota Asal</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['destination']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Service</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['service_code']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td><td>:</td><td><?= $data['rajaongkir']['result']['summary']['status']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
//                                            
                                            }
                                        } else {
                                            echo $data['rajaongkir']['status']['description'];
                                        }
                                        ?>
                                    </table>
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No</th>
                                            <th>Deskripsi</th>
                                            <th>Tgl</th>
                                            <th>Waktu</th>

                                        </tr>
                                        <?php
                                        $data = json_decode($response, true);
                                        if ($data['rajaongkir']['status']['code'] == '200') {
                                            if ($data) {
//                                            
                                                for ($i = 0; $i < count($data['rajaongkir']['result']['manifest']); $i++) {
                                                    ?> 
                                                    <tr>
                                                        <td><?= $i+1; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['manifest_description']; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['manifest_date']; ?></td>
                                                        <td><?= $data['rajaongkir']['result']['manifest'][$i]['manifest_time']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            echo $data['rajaongkir']['status']['description'];
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>

</div>
