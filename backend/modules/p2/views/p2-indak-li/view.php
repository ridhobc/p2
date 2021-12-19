<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\bendahara\models\TabMasukRek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LI-1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$cekno1 = \backend\modules\p2\models\P2IndakLiNosurat::find()
        ->where(['li_id' => $model->id])
        ->count();
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?php
    if ($cekno1 > '0') {
        
    } else {
        echo Html::a('Ambil Nomor', ['ambil-no-li', 'id' => $model->id], ['class' => 'btn btn-danger']);
    }
    ?>
    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'LI-1'); ?></h3>         
<div  role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lembar Informasi (LI-1)</h2>
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
                                            'heading' => 'Dasar NI  # ' . $model->no_li,
                                            'type' => DetailView::TYPE_INFO,
                                        ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                        'attributes' => [
                                            'kd_kantor',
                                            'no_li',
                                            'tgl_li',
                                            'sumber_info',
                                            'isi_info:ntext',
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
                                    'heading' => 'Locus/Tempus  # ' . $model->no_li,
                                    'type' => DetailView::TYPE_INFO,
                                ],
//        'buttons1' => '{update} {delete}',        //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'buttons1' => '', //untuk menambahkan tombol edit dan delete. untuk delete tambahkan {delete}
                                'attributes' => [
                                    'tindak_lanjut_li',
                                    'catatan_tindak_lanjut_li:ntext',
                                    'petugas_id',
                                    'pejabat_id',
                                    'created_at',
                                    'created_by',
                                    'updated_at',
                                    'updated_by',
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
