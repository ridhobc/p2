<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\detail\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SuratmasukArsipDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>


<div class="main_container">

    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-bars"></i> STPI </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="nav nav-tabs ">

                    <li class="active"><a href="#stpi" data-toggle="tab"><?php echo Yii::t('app', 'ST-I') ?></a></li>
                    <li class=""><a href="#petugas" data-toggle="tab"><?php echo Yii::t('app', 'Petugas') ?></a></li>


                </ul>
                <div class="tab-content">
                    <br/>
                    <!-- Pagu -->                      
                    <div class="tab-pane active" id="stpi">
                        <div class="row">
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
                        </div>
                    </div>
                    <div class="tab-pane " id="petugas">
                         <br/>
                        <div class="row">
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
                                    'nip_pegawai'
//                                [
//                                    'attribute' => 'Nama',
//                                    'value' => function ($data) {
//                                        return $data->petugas->nama_petugas;
//                                    }
//                                ],
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





