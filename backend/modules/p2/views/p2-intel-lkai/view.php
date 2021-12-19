<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\bendahara\models\TabMasukRek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'LKAI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$cekno1 = \backend\modules\p2\models\P2IntelLkaiNosurat::find()
        ->where(['lkai_id' => $model->id])
        ->count();
?>
<h3 class="box-title">
    <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?> 
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?php
    if ($cekno1 > '0') {
        
    } else {
        echo Html::a('Ambil Nomor', ['ambil-no-lkai', 'id' => $model->id], ['class' => 'btn btn-danger']);
    }
    ?>
    <i class="fa fa-file "></i>  <?php echo Yii::t('app', 'LKAI'); ?></h3>         
<div  role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lembar Kerja Analisis Intelijen </h2>
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
                                        'model' => $modelview,
                                        'condensed' => true,
                                        'hover' => true,
                                        'bootstrap' => true,
                                        'bordered' => true,
                                        'responsive' => true,
                                        'mode' => DetailView::MODE_VIEW,
                                        'panel' => [
                                            'heading' => 'LKAI  # ' . $modelview->no_lkai,
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
                                'model' => $modelview,
                                'condensed' => true,
                                'hover' => true,
                                'bootstrap' => true,
                                'bordered' => true,
                                'responsive' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'Analisis  # ' . $modelview->no_lkai,
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
<div  role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Approve</h2>
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
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="col-xs-12">

                            <div class="row"> 
                                <div class="col-md-4">
                                    <?php
                                    $Angsung = \yii\helpers\ArrayHelper::map(
                                                    backend\modules\p2\models\P2Pejabat::find()
                                                            ->all(), 'nip_pejabat', 'nm_pejabat');
                                    echo $form->field($model, 'keputusan_angsung_nip')->widget(\kartik\widgets\Select2::classname(), [
                                        'data' => $Angsung,
                                        'options' => [
                                            'placeholder' => 'Angsung',
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ]);
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    $kepangsung = [

                                        'setuju' => 'Setuju',
                                        'tidak' => 'Tidak Setuju'
                                    ];
                                    echo $form->field($model, 'keputusan_angsung_id')->widget(\kartik\widgets\Select2::classname(), [
                                        'data' => $kepangsung,
                                        'options' => [
                                            'placeholder' => 'Persetujuan',
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ]);
                                    ?>                                                   
                                </div>  
                                <div class="col-md-4">
                                    <?=
                                    $form->field($model, 'keputusan_angsung_tgl_terima')->widget(\kartik\widgets\DatePicker::className(), [
                                        'options' => ['placeholder' => 'Tgl Terima..'],
                                        'language' => 'id',
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                            'todayHighlight' => true,
                                            'todayBtn' => true,
                                        ],
                                        
                                    ])
                                    ?>                                                 
                                </div>  
                            </div>
                            <div class="row">                                 
                                <div class="col-md-12">
                                    <?= $form->field($model, 'keputusan_angsung_cat')->textarea(['rows' => 6]) ?>
                                </div>                
                            </div>
                            <div class="row"> 
                                <div class="col-md-4">
                                    <?php
                                    $atasAngsung = \yii\helpers\ArrayHelper::map(
                                                    backend\modules\p2\models\P2Pejabat::find()
                                                            ->all(), 'nip_pejabat', 'nm_pejabat');
                                    echo $form->field($model, 'keputusan_atasan_angsung_nip')->widget(\kartik\widgets\Select2::classname(), [
                                        'data' => $atasAngsung,
                                        'options' => [
                                            'placeholder' => 'Atasan Angsung',
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ]);
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    $kepangsung = [

                                        'setuju' => 'Setuju',
                                        'tidak' => 'Tidak Setuju'
                                    ];
                                    echo $form->field($model, 'keputusan_atasan_angsung_id')->widget(\kartik\widgets\Select2::classname(), [
                                        'data' => $kepangsung,
                                        'options' => [
                                            'placeholder' => 'Persetujuan',
                                        ],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                        ],
                                    ]);
                                    ?>                                                   
                                </div>  
                                <div class="col-md-4">
                                    <?=
                                    $form->field($model, 'keputusan_atasan_angsung_tgl_terima')->widget(\kartik\widgets\DatePicker::className(), [
                                        'options' => ['placeholder' => 'Tgl Terima..'],
                                        'language' => 'id',
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                            'todayHighlight' => true,
                                            'todayBtn' => true,
                                        ],
                                        
                                    ])
                                    ?>                                                 
                                </div>  
                            </div>
                            <div class="row">                                 
                                <div class="col-md-12">
                                    <?= $form->field($model, 'keputusan_atasan_angsung_cat')->textarea(['rows' => 6]) ?>
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