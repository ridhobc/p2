<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\editable\Editable;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\bendahara\models\TabMasukRek */



$this->title = Yii::t('app', 'Laporan Pelaksanaan Tugas Intelijen');
$this->params['breadcrumbs'][] = ['label' => 'STPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php
$cekno1 = \backend\modules\p2\models\P2IntelLptiNosurat::find()
        ->where(['lpti_id' => $modellpti->id])
        ->count();
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 

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
                                    'id',
                                    'no_stpi',
                                    [
                                        'attribute' => 'tgl_rekam',
                                        'format' => ['date', 'php:d M Y']
                                    ],
                                    'periode_penugasan',
                                    'uraian_tugas',
                                    'wilayah_penugasan',
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
                                                    return $data->petugas->nama_petugas;
                                                }
                                            ],
                                        ],
                                    ]);
                                    ?>

                                </div>                            
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="x_content">                           
                                <?php $form = ActiveForm::begin(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($modellpti, 'lpti_simpulan')->textarea(['rows' => 6]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($modellpti, 'lpti_rekom')->textarea(['rows' => 6]) ?>
                                    </div>                                    
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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


