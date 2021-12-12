<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\P2KategoriObjek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="p2-kategori-objek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_kategori')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
