<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>LEMBAR ANALISIS PRA PENINDAKAN</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h2>Sumber Informasi</h2>

                <?php $form = ActiveForm::begin(); ?>


                <div class="row">
                    <div class="col-md-4">
                        <?php
                        $li = \yii\helpers\ArrayHelper::map(
                                        backend\modules\p2\models\P2IndakLi::find()
                                                ->all(), 'id', 'no_li', 'tgl_li');
                        echo $form->field($model, 'li_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $li,
                            'options' => [
                                'placeholder' => 'Lembar Informasi 1',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'disabled' => false
                        ]);
                        ?>
                    </div> 
                    <div class="col-md-4">
                        <?php
                        $ni = \yii\helpers\ArrayHelper::map(
                                        backend\modules\p2\models\P2IntelNi::find()
                                                ->all(), 'id', 'no_ni', 'tgl_ni');
                        echo $form->field($model, 'ni_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $ni,
                            'options' => [
                                'placeholder' => 'Nota Informasi',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'disabled' => false
                        ]);
                        ?>
                    </div> 
                    <div class="col-md-4">
                        <?php
                        $nhi = \yii\helpers\ArrayHelper::map(
                                        backend\modules\p2\models\P2IntelNhi::find()
                                                ->all(), 'id', 'no_nhi', 'tgl_nhi');
                        echo $form->field($model, 'nhi_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $nhi,
                            'options' => [
                                'placeholder' => 'Nota Hasil Intelijen',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'disabled' => false
                        ]);
                        ?>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $kategoriObjek = \yii\helpers\ArrayHelper::map(
                                        backend\modules\setting\models\P2KategoriObjek::find()
                                                ->all(), 'id', 'nm_kategori');
                        echo $form->field($model, 'kategori_objek_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $kategoriObjek,
                            'options' => [
                                'placeholder' => 'Kategori Objek',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                            'disabled' => false
                        ]);
                        ?>
                    </div> 

                </div>
                <div class="ln_solid"></div>



            </div>
        </div>
    </div>


</div>

<div class="row">


    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Uraian Pra Penindakan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h2>Substansi (centang jika diketahui)</h2>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'pelaku_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'pelaku_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'pelanggaran_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'pelanggaran_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'locus_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'locus_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'tempus_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'tempus_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'prosedural_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'prosedural_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'sdm_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'sdm_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'sarpras_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'sarpras_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'anggaran_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'anggaran_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
               

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Kelayakan Operasi Penindakan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <h2>Jika Layak Operasi (centang jika ya)</h2>            
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'layak_operasi_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>                     
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'mandiri_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'mandiri_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'dgn_bantuan_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'dgn_bantuan_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'pelimpahan_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'pelimpahan_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'pelimpahan_bantuan_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'pelimpahan_bantuan_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'perbantuan_insta_lain_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'perbantuan_insta_lain_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <br/>
                <h2>Jika Tidak/Belum Layak Operasi (centang jika ya)</h2>            
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'tidak_layak_operasi_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>                     
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'layak_patroli_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'layak_patroli_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <?=
                        $form->field($model, 'tidak_layak_patroli_cek')->widget(CheckboxX::classname(), [
                            'initInputType' => CheckboxX::INPUT_CHECKBOX,
                            'autoLabel' => true,
                            'disabled' => false
                        ])->label(false);
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'tidak_layak_patroli_keterangan')->textInput(['maxlength' => true]) ?>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12">
                        <?= $form->field($model, 'kesimpulan_lapp')->textarea(['rows' => 6]) ?>
                    </div>
                    
                </div>
                <div class="row">                   
                    <div class="col-md-6">
                        <?php
                        $pejabat = \yii\helpers\ArrayHelper::map(
                                        \backend\modules\p2\models\P2Pejabat::find()
                                                ->all(), 'nip_pejabat', 'nm_pejabat');
                        echo $form->field($model, 'pejabat_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $pejabat,
                            'options' => [
                                'placeholder' => 'Pejabat TTD',
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>
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