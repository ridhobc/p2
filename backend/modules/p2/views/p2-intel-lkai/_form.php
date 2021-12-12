<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\modules\p2\models\P2IntelStpi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-6 col-sm-6 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>LEMBAR KERJA ANALISIS INTELIJEN</h2>
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
            <h2>Silahkan Pilih Dokumen Sumber </h2>
            <div class="row">
                <div class="col-md-4">
                    
                    <?=
                    $form->field($model, 'dok_sumber_lppi')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'autoLabel' => true
                    ])->label(false);
                    ?>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    <?=
                    $form->field($model, 'dok_sumber_lpti')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'autoLabel' => true
                    ])->label(false);
                    ?>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    <?=
                    $form->field($model, 'dok_sumber_npi')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'autoLabel' => true
                    ])->label(false);
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
