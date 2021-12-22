<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Welcome: SiAP';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}"
];
?>
<style type="text/css">

    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
    html,body { 
        background: url('web/images/background1.jpg') no-repeat center center fixed; 
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;

    }
    .login-page,register-page{
        background: transparent;
    }
</style>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <aside class="col-sm-4">

            <div class="card">
                <article class="card-body">                    
                    <?= Html::a('SIGN UP', ['signup'], ['class' => 'float-right btn btn-outline-primary']) ?>
                    <h4 class="card-title mb-4 mt-1">Sign in</h4>
                    <div class="login-box-body panel-body ">
                        <p class="login-box-msg">Intelligence Operation Support System Sulbagtara</p>

                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

                        <?=
                                $form
                                ->field($model, 'username', $fieldOptions1)
                                ->label(false)
                                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
                        ?>

                        <?=
                                $form
                                ->field($model, 'password', $fieldOptions2)
                                ->label(false)
                                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                        ?>
                        <br/>
                        <div class="row">
                            <div class="col-xs-8">
                                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                    <br/>
                    <br/>
                    <br/>

                    <div class="panel-footer" >
                        <div class="margin text-center">
                            <?= Html::a('LUPA PASSWORD', ['request-password-reset'], ['class' => 'float-left btn btn-outline-primary']) ?>.
                        </div>                    
                    </div>
                    <br/>
                    <br/>

                </article>
            </div> <!-- card.// -->
    </div>

</div>

