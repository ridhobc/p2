<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\bendahara\models\TabMasukRek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'NHI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$cekno1 = \backend\modules\p2\models\P2IntelNhiNosurat::find()
        ->where(['nhi_id' => $model->id])
        ->count();
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?php
    if ($cekno1 > '0') {
        
    } else {
        echo Html::a('Ambil Nomor', ['ambil-no-nhi', 'id' => $model->id], ['class' => 'btn btn-danger']);
    }
    ?>
    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'NHI'); ?></h3>         
<div  role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nota Hasil Intelijen</h2>
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

                        <div class="col-xs-6">
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
                                            'heading' => 'Dasar NHI  # ' . $model->no_nhi,
                                            'type' => DetailView::TYPE_INFO,
                                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'attributes' => [
                                            'no_nhi',
                                            'tgl_nhi',
                                            'sifat_nhi_id',
                                            'klasifikasi_nhi_id',
                                            'lkai_id',
                                            'kd_kantor_tujuan_nhi_id',
                                        ],
                                    ])
                                    ?>

                                </div>
                                <?php
                                if ($cekno1 > '0') {
                                    echo Html::a('Cetak', ['export-tandaterima', 'id' => $modellpti->id], ['class' => 'btn btn-primary']);
                                } else {
                                    echo "-";
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-xs-6">
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
                                    'heading' => 'Locus/Tempus  # ' . $model->no_nhi,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [
                                    'tempat_info',
                                    'tgl_info',
                                    'kantor_bc_info_id',
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
<div  role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail</h2>
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

                        <div class="col-xs-12">


                            <div class="row">                                 
                                <div class="col-md-12">
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
                                            'heading' => 'Detail NHI  # ' . $model->no_nhi,
                                            'type' => DetailView::TYPE_INFO,
                                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'attributes' => [
                                            'kepabenanan_info_chek',
                                            'nm_no_dok_kepabeanan',
                                            'nm_sarkut_kepab',
                                            'voy_nopol_sarkut_kepab',
                                            'no_bl_awb',
                                            'no_kontainer_merk_koli',
                                            'nm_imp_eks_ppjk',
                                            'npwp',
                                            'jenis_jumlah_brg_kepab',
                                            'data_lainnya_kepab',
                                            'cukai_info_cek',
                                            'nm_eks_pab_tpe',
                                            'nm_penyalur',
                                            'nm_tpe',
                                            'no_nppbkc',
                                            'nm_sarkut_cukai',
                                            'voy_nopol_sarkut_cukai',
                                            'jenis_jumlah_brg_cukai',
                                            'data_lainnya_cukai',
                                            'barang_tertentu_cek',
                                            'nm_no_dok_brg_tertentu',
                                            'nm_sarkut_brg_tertentu',
                                            'voy_nopol_brg_tertentu',
                                            'no_bl_awb_brg_tertentu',
                                            'no_kontainer_merk_koli_brg_tertentu',
                                            'org_badan_hukum',
                                            'jenis_jumlah_brg_brg_tertentu',
                                            'data_lainnya_cukai_brg_tertentu',
                                            'indikasi_info:ntext',
                                            'pejabat_id',
                                            'tembusan_kantor',
                                            'created_at',
                                            'created_by',
                                            'updated_at',
                                            'updated_by',
                                        ],
                                    ])
                                    ?>     
                                </div>                
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>