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
$this->params['breadcrumbs'][] = ['label' => 'LPTI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$cekno1 = \backend\modules\p2\models\P2IntelLptiNosurat::find()
        ->where(['lpti_id' => $model->id])
        ->count();
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?php
    if ($cekno1 > '0') {
        
    } else {
        echo Html::a('Ambil Nomor', ['ambil-no-lpti', 'id' => $model->id], ['class' => 'btn btn-danger']);
    }
    ?>
    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'LPTI'); ?></h3>         
<div  role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Laporan Pelaksanaan Tugas Intelijen </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <div class="col-xs-7">
                            <div >

                                <div >
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
                                            'heading' => 'Laporan Pelaksanaan Tugas  # ' . $model->no_lpti,
                                            'type' => DetailView::TYPE_INFO,
                                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'attributes' => [
                                            'kd_kantor',
                                            'no_lpti',
                                            [
                                                'attribute' => 'tgl_lpti',
                                                'format' => ['date', 'php:d M Y']
                                            ],
                                            'sumber_info',
                                            'metode_pengumpulan_info',
                                            'ikhtisar_informasi:ntext',
                                            'jenis_dok_pbc',
                                            'metode_analisa_intelijen:ntext',
                                            'ikhtisar_hasil:ntext',
                                            'jenis_pelanggaran',
                                            'modus_pelanggaran',
                                            'titik_koordinat',
                                            'perkiraan_tempat_pelanggaran',
                                            'perkiraan_waktu_pelanggaran',
                                            'perkiraan_pelaku',
                                            'info_lainnya:ntext',
                                            'lpti_simpulan:ntext',
                                            'lpti_rekom:ntext',
                                            'created_at',
                                            'created_by',
                                            'updated_at',
                                            'updated_by',
                                        ],
                                    ])
                                    ?>

                                </div>
                                <?php
                                if ($cekno1 > '0') {
                                    echo Html::a('Cetak', ['export-tandaterima', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                } else {
                                    echo "-";
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-xs-5">
                            <?=
                            DetailView::widget([
                                'model' => $modelstpi,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Surat Tugas  # ' . $modelstpi->tgl_rekam,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [
                                    'id',
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
                                        'value' => $modelstpi->pejabatttd->nm_pejabat,
                                    ],
                                ],
                            ])
                            ?>

                            <div >
                                <div class="box-header" id="callout-input-needs-type">
                                    <h4 class="box-title"><?php echo Yii::t('app', 'Petugas'); ?></h4>
                                </div>
                                <div class="box-body ">

                                    <?php
                                    $searchModel = new \backend\modules\p2\models\P2IntelStpiPetugasSearch([
                                        'id_intel_stpi' => $modelstpi->id,
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


    </div>
</div>


