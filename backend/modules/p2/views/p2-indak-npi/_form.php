<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nota Pengembalian Informasi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                 <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                     
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
                
                <div class="row">                    
                    <div class="col-md-12">                       
                         <?= $form->field($model, 'info_npi')->textarea(['rows' => 6]) ?>
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


