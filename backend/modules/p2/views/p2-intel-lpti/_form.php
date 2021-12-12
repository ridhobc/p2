<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>LPT Intelijen </h2>
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

            <div class="row">
                <div class="col-md-6">
                    <?php
                    //= $form->field($model, 'training_id')->textInput()
                    $stpi = \yii\helpers\ArrayHelper::map(
                                    \backend\modules\p2\models\P2IntelStpi::find()
                                            ->where(['kd_kantor' => @Yii::$app->user->identity->kd_kantor])
                                            ->all(), 'id', 'no_stpi', 'tgl_stpi');
                    echo $form->field($model, 'stpi_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => $stpi,
                        'options' => [
                            'placeholder' => 'STPI',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4">
                    <?= $form->field($model, 'sumber_info')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'metode_pengumpulan_info')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-4">
                     <?= $form->field($model, 'ikhtisar_informasi')->textarea(['rows' => 6]) ?>                    
                </div>                
            </div>
            <div class="row">                
                <div class="col-md-4">
                    <?= $form->field($model, 'jenis_dok_pbc')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'metode_analisa_intelijen')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <?= $form->field($model, 'ikhtisar_hasil')->textarea(['rows' => 6]) ?>                    
                </div> 
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'jenis_pelanggaran')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'modus_pelanggaran')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'titik_koordinat')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'perkiraan_tempat_pelanggaran')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'perkiraan_waktu_pelanggaran')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'perkiraan_pelaku')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                     <?= $form->field($model, 'info_lainnya')->textarea(['rows' => 6]) ?> 
                  
                </div>
                
            </div>
            <div class="row">
                 <div class="col-md-6">
                    <?= $form->field($model, 'lpti_simpulan')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'lpti_rekom')->textarea(['rows' => 6]) ?>
                    
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">


                </div>
            </div>
            <div class="row">
                <div class="col-md-6">


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

