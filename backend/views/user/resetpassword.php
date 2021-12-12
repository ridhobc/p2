<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\widgets\MaskedInput;
use kartik\datecontrol\DateControl;
use kartik\widgets\SwitchInput;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Reset Password User</h2>
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
                    <div class="item form-group">
                        <?= $form->field($model, 'password_reset')->passwordInput(['value' => '123456abc', 'placeholder' => '123456abc', 'readonly' => true]) ?>
                        <label class="label label-info">Reset ke password standard : 123456abc</label>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Reset', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                     <?php ActiveForm::end(); ?>
           
            </div>
        </div>
    </div>
</div>
