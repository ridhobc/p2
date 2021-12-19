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
                                    DetailView::widget([
                                        'model' => $modellkai,
                                        'condensed' => true,
                                        'hover' => true,
                                        'bootstrap' => true,
                                        'bordered' => true,
                                        'responsive' => true,
                                        'mode' => DetailView::MODE_VIEW,
                                        'panel' => [
                                            'heading' => 'LKAI  # ' . $modellkai->no_lkai,
                                            'type' => DetailView::TYPE_INFO,
                                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'attributes' => [
                                            'no_lkai',
                                            'tgl_lkai',
                                            'dok_sumber_lppi',
                                            'no_lppi_id',
                                            'dok_sumber_lpti',
                                            'no_lpti_id',
                                            'dok_sumber_npi',
                                            'no_npi',
                                            'tgl_npi',
                                        ],
                                    ])
                                    ?>
                        </div>
                    </div>
                    <div class="tab-pane " id="tl">
                        <br/>
                        <div class="row">
                              <?=
                            DetailView::widget([
                                'model' => $modellkai,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Analisis  # ' . $modellkai->no_lkai,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [

                                    'ikhtisar_informasi_lkai:ntext',
                                    'prosedur_analisis_lkai:ntext',
                                    'hasil_analisis_lkai:ntext',
                                    'kesimpulan_lkai',
                                    'rekomendasi_lainnya_ur:ntext',
                                    'informasi_lainnya_id',
                                    'informasi_lainnya_ur:ntext',
                                    'tujuan_lkai',
                                    'analis_lkai_nip',
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





