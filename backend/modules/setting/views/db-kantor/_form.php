<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\DbKantor */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Kantor </h2>
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
                    <?= $form->field($model, 'kd_kantor')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-6">
                    
                   <?= $form->field($model, 'nm_kantor')->textInput(['maxlength' => true]) ?>
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