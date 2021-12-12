<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;
use kartik\widgets\SwitchInput;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\modules\wasdal\models\WasdalRencanaHapusAadb */
/* @var $form yii\widgets\ActiveForm */
?>


    
        <div class="hapus-aadb-form">
            <p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required"> <b style=color:red;>*</b></span> <?php echo Yii::t('app', 'Wajib Isi.'); ?></p>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'hapus-aadb-form',
                        'enableAjaxValidation' => false,
                        'fieldConfig' => [
                            'template' => "{label}{input}{error}",
                        ],
            ]);
            ?>
            <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('app', 'Tujuan Pengiriman Surat'); ?></h4>
                </div>
                <div class="box-body">
                    <div class="row">                        
                        <div class="col-md-4">
                            <?= $form->field($model, 'nm_tujuan')->textInput(['maxlength' => true]) ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'alamat_tujuan1')->textArea(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'alamat_tujuan2')->textArea(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'alamat_tujuan3')->textArea(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'kota_tujuan')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">

                            <?php
                            //= $form->field($model, 'training_id')->textInput()
                            $tujuan = \yii\helpers\ArrayHelper::map(
                                            backend\modules\pos\models\PosPropinsiKota::find()->all(), 'id', 'name');
                            echo $form->field($model, 'kota_tujuan_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => $tujuan,
                                'options' => [
                                    'placeholder' => 'Pilih Tujuan...',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ],
                            ]);
                            ?>
                        </div>

                    </div>
                    <!--                    <div class="row">
                                                                  
                                            
                                        </div>-->
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
                <div class="col-xs-6 col-xs-12">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
                </div>

            </div>


            <?php ActiveForm::end(); ?>
        </div>
   

