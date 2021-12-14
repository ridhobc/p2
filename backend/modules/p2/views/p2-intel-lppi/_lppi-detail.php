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
                <h2><i class="fa fa-bars"></i> INFORMASI </h2>
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

                    <li class="active"><a href="#lpti" data-toggle="tab"><?php echo Yii::t('app', 'LPTI') ?></a></li>
                    <li class=""><a href="#tl" data-toggle="tab"><?php echo Yii::t('app', 'TindakLanjut') ?></a></li>


                </ul>
                <div class="tab-content">
                    <br/>
                    <!-- Pagu -->                      
                    <div class="tab-pane active" id="lpti">
                        <div class="row">
                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'pjax' => true,
                                'striped' => true,
                                'hover' => true,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                  
                                    'ikhtisar_info:ntext',
                                    'cek_sumber_id',
                                    'cek_validitas_id',
//                                       
//                                    [
//                                        'attribute' => 'Nama Kantor',
//                                        'value' => function ($data) {
//                                            return $data->kantor->nm_kantor;
//                                        }
//                                    ],
//                                    'nip_pegawai'
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
                    <div class="tab-pane " id="tl">
                        <br/>
                        <div class="row">
                            <?=
                            DetailView::widget([
                                'model' => $modellppi,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'LPPI Nomor  # ' . $modellppi->no_lppi,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [

                                    'no_lppi',
                                    [
                                        'attribute' => 'tgl_lppi',
                                        'format' => ['date', 'php:d M Y']
                                    ],
                                    'kesimpulan',
                                    'disposisi_id',
                                    'tgl_disposisi',
                                    'tindak_lanjut_id'
                                    
                                ],
                            ])
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>





