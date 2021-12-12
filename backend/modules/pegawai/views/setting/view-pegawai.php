<?php

use yii\helpers\Html;

use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\modules\spmbcetak\models\SpmbSp */

$this->title = $model->Nip;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4">
        <div class="col-md-12 text-center">
            <?php $url = \Yii::getAlias($model->UrlFoto);
           echo  Html::img($url, ['alt' => 'No Image', 'class' => 'img-circle edusec-img-disp']);
            ?>

        </div>

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
                'heading' => 'Nama : ' . $model->NmPegawai,
                'type' => DetailView::TYPE_INFO,
            ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
            'buttons1' => '{view}', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
            'attributes' => [  
                'KdKantor',
                'NmJenisJabatan',
                'LokasiLahir',
                'TglLahir',
                'UraianJabatan',
                'NmJenisAgama',
                'UraianPangkat',
                'NmJenisKelamin',
                'TmtPangkat',
                'NmStatusPegawai',
                'NoKarpeg',
                'NPWP',
                'MkGolTahun',
                'MkGolBulan',
                
            ]
        ]);
        ?>



    </div>
    <div class="col-md-8">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Pendidikan'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                           'NmLembagaPendidikan',
                                            'NmPendidikanAwal',
                                            'NoIjazahAwal',
                                            'TglIjazahAwal',
                                            'NmPendidikanAkhir',
                                            'NoIjazahAkhir',
                                            'TglIjazahAkhir',                                          
                                            
                                            'GelarDepan',
                                            'GelarBelakang',
                                        ],
                                    ])
                                    ?>
                                    
                                </div>


                            </div>
                        </div>
                    </div>
        </div>
            <div class="col-md-12">
            <div class="box box-solid box-warning col-xs-12 col-lg-12 no-padding">
                        <div class="box-header with-border">
                            <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Kepangkatan'); ?></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                   <?=
                                    DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'TmtCpns',
                                            'TmtPNS',
                                           'TmtPangkat',
                                            'TmtEselon',
                                            'NoSkPangkat',
                                            'TglSkPangkat',
                                            'UraianPangkat',                                                                                                                               
                                            'NmJenisJabatan',
                                            'NoSkJabatan',
                                            'TglSkJabatan',
                                            'TmtJabatan',                                            
                                            'NmJabatanGrade',
                                            'Peringkat',
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
    

</div>
