<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;
use kartik\widgets\SwitchInput;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\modules\wasdal\models\WasdalRencanaHapusAadb */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Nomor Surat ' . $model->no_srt . ' tgl  ' . $model->tgl_srt;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spmb-sp-view">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-eye "></i> <?php echo Yii::t('app', 'Detail Pengiriman Surat'); ?></h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-xs6 col-lg-6">
                    <div class="box box-solid box-info col-xs-6 col-lg-6 no-padding">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs6 col-lg-6">
                    <div class="box box-solid box-info col-xs-6 col-lg-6 no-padding">
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Detail Surat'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required"> <b style=color:red;>*</b></span> <?php echo Yii::t('app', 'Wajib diisi.'); ?></p>
                                    <?php
                                    $form = ActiveForm::begin([
                                                'id' => 'hapus-aadb-form',
                                                'enableAjaxValidation' => false,
                                                'fieldConfig' => [
                                                    'template' => "{label}{input}{error}",
                                                ],
                                    ]);
                                    ?>

                                    <div class="row">                        
                                        <div class="col-md-12">
                                            <?= $form->field($model, 'no_resi')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        
                                    </div>


                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
                                    <div class="col-xs-6 col-xs-12">
                                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
                                    </div>

                                </div>


                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




