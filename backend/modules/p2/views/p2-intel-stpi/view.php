<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\editable\Editable;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $model backend\modules\bendahara\models\TabMasukRek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'STPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$cekno = \backend\modules\p2\models\P2IntelStpiNosurat::find()
        ->where(['stpi_id' => $model->id])
        ->count();
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?php
    if ($cekno > '0') {
        
    } else {
        echo Html::a('Ambil Nomor', ['ambil-no-stpi', 'id' => $model->id], ['class' => 'btn btn-danger']);
    }
    ?>

    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'SURAT TUGAS INTELIJEN'); ?></h3>         


<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Surat Tugas Intelijen </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div >
                       
                        <div class="col-xs-5">
                            <?=
                            DetailView::widget([
                                'model' => $model,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Surat Tugas  # ' . $model->tgl_rekam,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [

                                    'no_stpi',
                                    [
                                        'attribute' => 'tgl_rekam',
                                        'format' => ['date', 'php:d M Y']
                                    ],
                                    'periode_penugasan',
                                    'uraian_tugas',
                                    'wilayah_penugasan',
                                    [
                                        'attribute' => 'pejabat_id',
                                        'value' => $model->pejabatttd->nm_pejabat,
                                    ],
                                ],
                            ])
                            ?>

                            <div >
                                <div class="box-header" id="callout-input-needs-type">
                                    <h4 class="box-title"><?php echo Yii::t('app', 'Daftar Petugas'); ?></h4>
                                </div>
                                <div >

                                    <?php
                                    $searchModel = new \backend\modules\p2\models\P2IntelStpiPetugasSearch([
                                        'id_intel_stpi' => $model->id,
                                    ]);
                                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                    ?>

                                    <?=
                                    GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'pjax' => true,
                                        'striped' => true,
                                        'hover' => true,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            'nip_pegawai',
//                                       
                                            [
                                                'attribute' => 'Nama Kantor',
                                                'value' => function ($data) {
                                                    return $data->kantor->nm_kantor;
                                                }
                                            ],
                                            
                                            [
                                                'attribute' => 'Nama',
                                                'value' => function ($data) {
                                                    return $data->petugas->nm_petugas;
                                                }
                                            ],
                                            [

                                                'class' => 'kartik\grid\EditableColumn',
                                                'attribute' => 'status_pegawai',
                                                'filter' => $bidang,
                                                'value' => function ($data) {
                                                    return $data->status->nm_status;
                                                },
                                                'editableOptions' => [
                                                    'inputType' => Editable::INPUT_SELECT2,
                                                    'options' => [
                                                        'data' => \yii\helpers\ArrayHelper::map(backend\modules\setting\models\P2StatusPetugas::find()->all(), 'nm_status', 'nm_status'),
                                                    ]
                                                ],
                                            ],
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'template' => '{delete}',
                                                'buttons' => [

                                                    'delete' => function ($url, $model) {
                                                        $url = \Yii::$app->getUrlManager()->createUrl(["p2/p2-intel-stpi/deletedetail", "id" => $model->id, "nip_pegawai" => $model->nip_pegawai, "idx" => $_GET['idx'],]);
                                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                                                    'title' => Yii::t('yii', 'Delete'),
                                                                    'data' => [
                                                                        'confirm' => Yii::t('fees', 'Are you sure you want to delete this item?'),
                                                                        'method' => 'post',
                                                        ]]);
                                                    }
                                                        ]
                                                    ],
                                                ],
                                            ]);
                                            ?>

                                        </div>                            
                                    </div>
                                    <?php
                                    if ($cekno > '0') {
                                       echo Html::a('Cetak', ['export-tandaterima', 'id' => $model->id], ['class' => 'btn btn-primary']); 
                                    } else {
                                        
                                    }
                                    ?>


                                </div>
                                <div class="col-xs-7">
                                    <div >
                                        <div >
                                            <h4 class="box-title"><?php echo Yii::t('app', 'Daftar Pegawai '); ?> <?= Html::a('+', ['/setting/p2-petugas'], ['class' => 'btn btn-warning']) ?></h4>
                                        </div>
                                        <div >

                                            <?php
                                            $searchModel = new backend\modules\setting\models\P2PetugasSearch([
                                                'kd_kantor' => @Yii::$app->user->identity->kd_kantor,
                                            ]);
                                            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                            ?>
                                            <?=
                                            GridView::widget([

                                                'dataProvider' => $dataProvider,
                                                'filterModel' => $searchModel,
                                                'summary' => '',
                                                'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
                                                    'nip_petugas',
                                                    'nm_petugas',
                                                    'kd_kantor',
                                                    'pangkat_petugas',
                                                    'gol_petugas',
                                                    'jabatan_petugas',
                                                    'status_aktif',
//                                            [
//                                                'header' => 'Tgl SPM',
//                                                'value' => function ($data) {
//                                                    return $data->spm->tgl_spm;
//                                                }
//                                            ],
//                                            [
//                                                'header' => 'PPK',
//                                                'value' => function ($data) {
//                                                    return $data->ppk->nm_ppk;
//                                                }
//                                            ],
//                                            [
//                                                'attribute' => 'nilai_bersih',
//                                                'width' => '150px',
//                                                'hAlign' => 'right',
//                                                'format' => ['decimal', 2],
//                                            ],
//                                            [
//                                                'attribute' => 'total_pot_pajak',
//                                                'width' => '150px',
//                                                'hAlign' => 'right',
//                                                'format' => ['decimal', 2],
//                                            ],
//                                            'nomor_spm',
//                                            [
//                                                'header' => 'Tgl SPM',
//                                                'value' => 'tgl_spm'
//                                            ],
//                                            'nilai_spm',
//                                            [
//                                                'class'=>'kartik\grid\EditableColumn',
//                                                'header'=>'Pot Pajak',
//                                                'attribute'=>'total_pot_pajak',
//                                            ],
//                                            
//                                            [
//                                                'header' => 'PPK',
//                                                'value' => function ($data) {
//                                                    return $data->ppk->nm_ppk;
//                                                }
//                                            ],
//                                            [
//                                                'header' => 'Unit',
//                                                'value' => function ($data) {
//                                                    return $data->unit->nm_unit;
//                                                }
//                                            ],
                                                    [
                                                        'header' => 'Klik Tambahkan',
                                                        'format' => 'raw',
                                                        'value' => function ($data) {

                                                            return Html::a("Tambahkan", ['tambahkan', 'nip' => $data->nip_petugas, 'idx' => $_GET['idx']]); // ubah ini                                                            
                                                        },
                                                            ],
                                                        ],
                                                    ]);
                                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


   

